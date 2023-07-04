<script type="text/javascript">
    $(() => {
        init()

    })
    init = async () => {
        initializeDataTables();
        unblockPage();
    }

    function initializeDataTables() {
        $('#table-example').DataTable({
            processing: true,
            serverSide: true,
            clickAble: true,
                searchAble: true,
                destroyAble: true,
            ajax: {
                url: "{{ route('example.index') }}",
                type: "GET",
                dataType: "json",
            },
            // ajax: APP_URL + 'example/index',

            columns: [{
                    data: 'example_code',
                    name: 'example_code'
                },
                {
                    data: 'example_name',
                    name: 'example_name'
                },
                {
                    data: 'example_active',
                    name: 'example_active'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

                // Add more columns if needed
            ]
            
        });
    }
</script>
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="assets/js/custom/apps/customers/list/export.js"></script>
<script src="assets/js/custom/apps/customers/list/list.js"></script>
<script src="assets/js/custom/apps/customers/add.js"></script>
