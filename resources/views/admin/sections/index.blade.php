@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Section List
        @can('section_create')
            <a class="btn btn-success float-right" href="{{ route("admin.section.create") }}">
                  <i class="fas fa-plus-circle"></i>
            </a>
        @endcan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Section Name
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $key => $section)
                        <tr data-entry-id="{{ $section->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $section->name ?? '' }}
                            </td>
                            <td>
                                @can('section_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.section.edit', $section->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('section_delete')
                                    <form action="{{ route('admin.section.destroy', $section->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.section.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('class_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection