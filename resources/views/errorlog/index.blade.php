<style>
    /* Gaya untuk kartu log error */
    .card {
        background-color: #fff; /* Warna latar belakang kartu putih */
        color: #333; /* Warna teks */
        border: 1px solid #ddd; /* Warna border */
        border-radius: 5px; /* Sudut border */
        padding: 10px; /* Padding di dalam kartu */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan kartu */
    }

    /* Peningkatan teks */
    .card-body {
        font-size: 1.1em; /* Ukuran teks */
        font-weight: bold; /* Penebalan teks */
        line-height: 1.4; /* Jarak antar baris teks */
    }

    /* Tombol "Tampilkan Lebih Banyak" */
    #load-more-button {
        background-color: #007acc; /* Warna tombol */
        color: #fff; /* Warna teks tombol */
        border: none; /* Hapus border tombol */
        border-radius: 5px; /* Sudut tombol */
        padding: 10px 20px; /* Padding tombol */
        cursor: pointer; /* Ganti kursor saat mengarah ke tombol */
    }

    /* Hover tombol "Tampilkan Lebih Banyak" */
    #load-more-button:hover {
        background-color: #005eaa; /* Warna tombol saat hover */
    }
</style>

<div class="row" data-roleable="true" data-role="error-Read">
    <div id="log-container">
        <div class="row" id="log-list">
            <!-- Kartu-kartu log error akan ditampilkan di sini -->
        </div>
        <div class="text-center mt-4" id="load-more-container">
            <button class="btn btn-primary" id="load-more-button">Tampilkan Lebih Banyak</button>
        </div>
    </div>
    
    <!-- Modal untuk menampilkan detail log error -->
    <div class="modal fade" id="logDetailModal" tabindex="-1" aria-labelledby="logDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logDetailModalLabel">Detail Log Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Konten detail log error akan ditampilkan di sini -->
                </div>
            </div>
        </div>
    </div>
    
</div>

@include('errorlog.javascript')