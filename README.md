<div align=center>

# Midterm Project Framework Programming D ITS 24/25

### Anggota Kelompok

| Nama                    | NRP        |  
|-------------------------|------------|
| Muhammad Iqbal Ramadhan | 5025221274 |
| Arya Gading Prinandika  | 5025221280 |

</div>

## Judul Aplikasi

Sistem Informasi Asisten Dosen Terpadu **(SiAsdosPadu)**

## Database Model (PDM)

![img.png](src/PDM.png)

## Deskripsi singkat Aplikasi

Aplikasi yang kami buat merupakan sistem manajemen untuk pendaftaran sebagai Asisten Dosen di Teknik Informatika ITS
pada aplikasi ini terdapat 3 User Role yaitu `Student` `Lecturer` `Operator`. Dengan masing masing role mempunyai peranan sebagai berikut:

### Student
Student dapat register pada aplikasi, kemudian setelah registrasi akun maka dapat melihat data semua kelas yang ada. Student dapat memilih kelas yang diinginkan,
untuk pendaftaran sebagai asisten dosen perlu untuk Student memasukkan beberapa input seperti IPK, apakah bersedia hadir, apakah mendapatkan rekomendasi dan juga bukti rekomendasi jika ada.
Setelah berhasil mendaftar maka student perlu menunggu untuk registrasi sebagai asisten dosennya diterima atau tidak. Student dapat melakukan submisi ke beberapa kelas.

Jika student memiliki data dimana registrasinya diterima maka student dapat mengisi log book kegiatan sebagai asisten dosen, yang akan disetujui oleh lecturer atau pengajar dari kelas tersebut.

### Lecturer

Lecturer pada aplikasi ini hanya terbatas pada menerima asisten dosen dan memverifikasi log yang dikirimkan dari asisten dosen kelas yang diampu.

### Operator

Operator pada aplikasi ini memiliki peranan untuk mengelola data master yang diperlukan dalam aplikasi ini.  Operator dapat melakukan proses CRUD pada data user dan juga data Kelas beserta dengan pengajarnya.
Operator tidak dapat melihat atau melakukan verifikasi atas semua data asisten dosen.


## Database Relationship

Sesuai dengan gambar PDM (Database model) yang telah dicantumkan, pada aplikasi ini terdapat beberapa relationship seperti one-to-many dan juga many-to-many. Untuk relasi many-to-many ada pada tabel `Users` ke tabel `Course Class`
dan menggunakan sebuah pivot table yang bernama `Lecturers`. Untuk lebih lengkap dapat mengecek relationship yang dibuat di [sini](app/Models)


## Tampilan UI dari Aplikasi
<table>
  <thead>
    <tr>
      <th>
        <div align="center">
          <h3>Homepage</h3>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div align="center">
          <img src="src/homepage.png" alt="Home Page" width="90%">
        </div>
      </td>
    </tr>
  </tbody>
</table>

<table style="width: 100%;">
  <thead>
    <tr>
      <th colspan="100%">
        <div style="text-align: center;">
          <h3>Role: Student</h3>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="100%">
        <div style="text-align: center;">
          <img src="src/class-list.png" alt="class-list" style="width: 100%;">
          <p>Menampilkan semua kelas yang yang tersedia untuk mendaftar sebagai asisten dosen</p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">
        <div>
          <img src="src/student-registration-create.png" alt="registration" style="width: 90%;">
          <p>Melakukan pengisian form untuk melakukan pendaftaran sebagai asisten dosen</p>
        </div>
      </td>
      <td style="text-align: center;">
        <div>
          <img src="src/student-registration-data.png" alt="registration-data" style="width: 90%;">
          <p>Dashboard pendaftaran yang menampilkan semua data pendafataran yang sudah student lakukan</p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">
        <div>
          <img src="src/student-log-create.png" alt="log" style="width: 90%;">
          <p>Melakukan pengisian form untuk mengisi log</p>
        </div>
      </td>
      <td style="text-align: center;">
        <div>
          <img src="src/student-log-data.png" alt="log-data" style="width: 90%;">
          <p>Dashboard log yang menampilkan semua data log yang sudah student lakukan</p>
        </div>
      </td>
    </tr>
  </tbody>
</table>

<table style="width: 100%;">
  <thead>
    <tr>
      <th colspan="100%">
        <div style="text-align: center;">
          <h3>Role: Lecturer</h3>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: center;">
        <div>
          <img src="src/lecturer-class-list.png" alt="lecturer-class-list" style="width: 90%;">
          <p>Menampilkan semua kelas yang dosen tersebut ajar</p>
        </div>
      </td>
      <td style="text-align: center;">
        <div>
          <img src="src/lecturer-acceptence-registration.png" alt="lecturer-acceptence-registration" style="width: 90%;">
          <p>Dosen melakukan penerima terhadap para mahasiswa yang melakukan pendafatran di kelas tersebut</p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">
        <div>
            <img src="src/lecturer-acceptence-log.png" alt="lecturer-acceptence-log" style="width: 90%;">
          <p>Dosen melakukan penerima terhadap para mahasiswa yang mengisi log</p>
        </div>
      </td>
      <td style="text-align: center;">
        <div>
          <img src="src/lecturer-registration-detail.png" alt="lecturer-registration-detail" style="width: 90%;">
          <p>Melihat datail dari data pendafataran asisten dosen</p>
        </div>
      </td>
    </tr>
    <tr>
  </tbody>
</table>

<table style="width: 100%;">
  <thead>
    <tr>
      <th colspan="100%">
        <div style="text-align: center;">
          <h3>Role: Operator</h3>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: center;">
        <div>
          <img src="src/operator-user-management.png" alt="operator-user-management" style="width: 90%;">
          <p>Menampilkan semua data user dosen maupun mahasiswa</p>
        </div>
      </td>
      <td style="text-align: center;">
        <div>
          <img src="src/operator-create-user.png" alt="operator-create-user" style="width: 90%;">
          <p>Melakukan pembuatan user baru oleh operator</p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">
        <div>
          <img src="src/operator-course-class-list.png" alt="operator-course-class-list" style="width: 90%;">
          <p>Menampilkan semua data kelas</p>
        </div>
      </td>
      <td style="text-align: center;">
        <div>
          <img src="src/operator-create-class.png" alt="operator-create-class." style="width: 90%;">
          <p>Melakukan pembuatan kelas baru oleh operator</p>
        </div>
      </td>
    </tr>
        <tr>
      <td style="text-align: center;">
        <div>
          <img src="src/operator-add-lecturer-to-class.png" alt="operator-add-lecturer-to-class" style="width: 90%;">
          <p>Melakukan penambahan dosen untuk kelas baru oleh operator</p>
        </div>
      </td>
    </tr>
  </tbody>
</table>


## YouTube Video


[![YouTube Video](https://img.youtube.com/vi/yDAwmI449LE/maxresdefault.jpg)](https://youtu.be/yDAwmI449LE)
