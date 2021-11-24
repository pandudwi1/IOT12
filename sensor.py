import MySQLdb
import random
import time

#koneksi database
db = MySQLdb.connect(
    host = "localhost",
    user = "root",
    password = "",
    db = "db_webiot"
    )

cursor = db.cursor()

#Pilih Sensor
print("======Pilih Sensor======")
print("1. Ph")
print("2. Suhu")

sensor = int(input("Sensor Yang Dipilih : "))

lama_pengecekan = input("Jangka Waktu : ")
jumlah_pengecekan = input("Jumlah Pengecekan : ")

#Sensor Ph
if sensor ==1:
    pilih_tabel = 'ph'
    nilai = 0
    jps = int(jumlah_pengecekan)
    wps = int(lama_pengecekan)
    nilai_max = jps
    while nilai < nilai_max:
        ph = str(random.randint(1, 12))
        phs = ph
        t_end = time.time() + 60 * wps
        v = 0
        tbl_ph = []

        while time.time() < t_end:
            print("-----")
            v += 1

        inp_ph = ph, phs
        tbl_ph.append(inp_ph)
        sq = "insert into "+pilih_tabel+" (ph_sebelum,ph_terakhir) values (%s,%s)"
        inpt = cursor.executemany(sq, tbl_ph)
        print("Data Pengecekan Berhasil", tbl_ph)

        nilai +=1

#Sensor Suhu
if sensor ==2:
    pilih_tabel = 'suhu'
    nilai = 0
    jps = int(jumlah_pengecekan)
    wps = int(lama_pengecekan)
    nilai_max = jps
    while nilai < nilai_max:
        ph = str(random.randint(10, 37))
        phs = ph
        t_end = time.time() + 60 * wps
        v = 0
        tbl_ph = []

        while time.time() < t_end:
            print("-----")
            v += 1

        inp_ph = ph, phs
        tbl_ph.append(inp_ph)
        sq = "insert into "+pilih_tabel+" (suhu_sebelum,suhu_terakhir) values (%s,%s)"
        inpt = cursor.executemany(sq, tbl_ph)
        print("Data Pengecekan Berhasil", tbl_ph)

        nilai +=1

db.commit()
db.close()
