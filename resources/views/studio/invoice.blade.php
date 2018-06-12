
<header class="head">
    <h1>Your <strong>Bookings (Harmon)</strong></h1>
    
    <br>

            <label>Studio Musik</label>
            <label>:</label>
            <label>{{$booking->studio->studioMusik->nama_studio_musik}}</label>
    <br>
            <label>Studio</label>
            <label>:</label>
            <label>{{$booking->studio->nama_studio}}</label>
    <br>
            <label>Tanggal Booking</label>
            <label>:</label>
            <label>{{$booking->tgl_booking}}</label>
    <br>
            <label>Dari Jam</label>
            <label>:</label>
            <label>{{$booking->mulai_booking}}</label>
    <br>
            <label>Sampai Jam</label>
            <label>:</label>
            <label>{{$booking->selesai_booking}}</label>
    <br>
            <label>Biaya</label>
            <label>:</label>
            <label>Rp. {{$booking->biaya_booking}}</label>

    <br>
            <label>Kode Unik</label>
            <label>:</label>
            <label>{{$booking->kode_unik}}</label>

</header>


