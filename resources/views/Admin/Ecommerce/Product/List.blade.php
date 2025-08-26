<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="fw-bold py-3 mb-0 pull-left">{{$serviceName}}</h4>
            <a class="btn btn-primary float-end" href="{{ route($routeName.'.create') }}">
                <i class='bx bx-plus-circle'></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-striped yajra-datatable" id="datatables-rows" data-url="{{ route($routeName.'.fetchList') }}">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Orders</th>
                            <th>Stock</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        var dt_table = $('#datatables-rows');
        dt_table.DataTable({
        "lengthMenu": [10, 25, 50, 100, 500],
        destroy: true,
        ordering: false,
        "processing": true,
        "serverSide": true,
        "ajax": {
          'type': 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          'url': dt_table.attr('data-url')
        },
        columns: [
          // columns according to JSON
          { data: 'nameImage' },
          { data: 'orders' },
          { data: 'stock' },
          { data: 'type' },
          { data: 'categories' },
          { data: 'tags' },
          { data: 'action' }
        ],
        // order: [[2, 'desc']],
        dom:
          '<"row mx-2"' +
          '<"col-md-2"<"me-3"l>>' +
          '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0 gap-3"fB>>' +
          '>t' +
          '<"row mx-2"' +
          '<"col-sm-12 col-md-6"i>' +
          '<"col-sm-12 col-md-6"p>' +
          '>',
        language: {
          sLengthMenu: 'Show _MENU_',
          search: '',
          searchPlaceholder: 'Search..'
        },
      });
    });
</script>