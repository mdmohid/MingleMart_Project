import serial
import oracledb
import os

# Initialize Oracle client
oracledb.init_oracle_client(lib_dir=r"C:\instantclient_19_22")

# Oracle DB Connection
DB_USER = "mdmohid"
DB_PASS = "root"
DB_CONN = "localhost/xe"

# def get_serial_uid():
#     try:
#         arduino = serial.Serial('COM3', 9600, timeout=10)
#         print("Waiting for RFID UID scan...")
        
#         while True:
#             line = arduino.readline().decode('utf-8').strip()
#             if line.startswith("B7852C03:"):
#                 uid = line.replace("D630CF01:", "").strip()
#                 arduino.close()
#                 return uid
#     except serial.SerialException as e:
#         print(f"Error reading serial port: {e}")
#         return None


def get_serial_uid():
    try:
        arduino = serial.Serial('COM3', 9600, timeout=10)
        print("Waiting for RFID UID scan...")
        
        while True:
            line = arduino.readline().decode('utf-8').strip()
            print(f"Received from Arduino: {line}")  # Optional debug line
            if line and len(line) >= 8:  # UIDs are typically 8 characters
                arduino.close()
                return line
    except serial.SerialException as e:
        print(f"Error reading serial port: {e}")
        return None



def check_product_exists(cursor, product_name):
    cursor.execute("SELECT COUNT(*) FROM products WHERE product_name = :1", (product_name,))
    result = cursor.fetchone()
    return result[0] > 0

def insert_product(cursor, product_name):
    print("Enter product details:")
    trader_id = int(input("Trader ID: "))
    description = input("Description: ")
    price = float(input("Price: "))
    image_path = input("Enter path to product image file (e.g. C:\\images\\item.png): ").strip().strip('"')

    # Read image file as binary
    try:
        # with open(image_path, 'rb') as f:
        #     image_data = f.read()
        image_data = image_path  # Just store the path as a string

    except Exception as e:
        print(f"❌ Failed to read image file: {e}")
        return

    # Generate slug from product_name
    slug = product_name.lower().replace(' ', '-').strip('-')

    # Insert into products table
    cursor.execute("""
        INSERT INTO products (2
            trader_id,
            product_name,
            description,
            price,
            image_url,
            slug
        ) VALUES (
            :trader_id,
            :product_name,
            :description,
            :price,
            :image_url,
            :slug
        )
    """, {
        'trader_id': trader_id,
        'product_name': product_name,
        'description': description,
        'price': price,
        'image_url': image_data,
        'slug': slug
    })

def main():
    try:
        conn = oracledb.connect(user=DB_USER, password=DB_PASS, dsn=DB_CONN)
        cursor = conn.cursor()
        print("✅ Connected to Oracle DB successfully.")
    except oracledb.DatabaseError as e:
        print(f"❌ Database connection error: {e}")
        return

    try:
        while True:
            uid = get_serial_uid()
            if not uid:
                print("⚠️ No UID read. Try again.")
                continue

            print(f"📟 Scanned UID (used as Product Name): {uid}")

            if check_product_exists(cursor, uid):
                print("⚠️ Product already exists. Use a different product name.")
            else:
                print("✅ New product. Let's add it.")
                insert_product(cursor, uid)
                conn.commit()
                print("🎉 Product inserted successfully.")

            cont = input("Scan another? (y/n): ")
            if cont.lower() != 'y':
                break
    except KeyboardInterrupt:
        print("\n🛑 Process interrupted by user.")
    finally:
        cursor.close()
        conn.close()
        print("🔒 Connection closed.")

if __name__ == "__main__":
    main()
