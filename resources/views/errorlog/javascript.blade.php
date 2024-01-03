    <script type="text/javascript">
        $(() => {
            init()

        })
        init = () => {
            quick.unblockPage();
        }
        $(document).ready(function() {
            var logList = $('#log-list');
            var loadMoreButton = $('#load-more-button');
            var logDetailModal = $('#logDetailModal');
            var logDetailModalTitle = $('#logDetailModalLabel');
            var logDetailModalContent = logDetailModal.find('.modal-body');
            var loadMoreContainer = $('#load-more-container');
            var logLines = []; // Menyimpan semua log error
            var displayedLogs = 0; // Menyimpan jumlah log error yang sudah ditampilkan
            var logsPerPage = 10; // Jumlah log error yang akan ditampilkan per kali klik "Tampilkan Lebih Banyak"

            // Fungsi untuk menampilkan kartu log error
            function displayLogs(start, end) {
                for (var i = start; i < end; i++) {
                    var logCard = $('<div class="col-md-4 mb-4"><div class="card"><div class="card-body">' +
                        logLines[i] + '</div></div></div>');
                    logCard.find('.card-body').click(function() {
                        var logIndex = $(this).parent().index(); // Ambil indeks kartu yang diklik
                        showLogDetail(logIndex);
                    });
                    logList.append(logCard);
                }
            }

            // Fungsi untuk menampilkan lebih banyak log error
            function loadMoreLogs() {
                var currentEnd = displayedLogs + logsPerPage;
                displayLogs(displayedLogs, currentEnd);
                displayedLogs = currentEnd;

                // Sembunyikan tombol jika sudah mencapai batas
                if (displayedLogs >= logLines.length) {
                    loadMoreContainer.hide();
                }
            }

            // Fungsi untuk menampilkan detail log error di modal
            function showLogDetail(logIndex) {
                var logDetail = logLines[logIndex];
                logDetailModalTitle.text('Detail Log Error');
                logDetailModalContent.text(logDetail);
                logDetailModal.modal('show');
            }


            // Mengambil log error dari endpoint
            $.ajax({
                url: '{{ route('log.showLog') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    logLines = response.log
                        .reverse(); // Membalik urutan agar yang terbaru muncul paling atas
                    loadMoreLogs(); // Tampilkan log error awal
                },
                error: function() {
                    alert('Gagal mengambil log error.');
                }
            });

            // Event handler untuk tombol "Tampilkan Lebih Banyak"
            loadMoreButton.click(function() {
                loadMoreLogs();
            });
        });
    </script>
