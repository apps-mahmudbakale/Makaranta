@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Subjects List
        @can('permission_create')
            <a class="btn btn-success float-right" href="{{ route("admin.subject.create") }}">
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
                            Subject Name
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $key => $subject)
                        <tr data-entry-id="{{ $subject->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subject->name ?? '' }}
                            </td>
                            <td>
                                @can('subject_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.subject.edit', $subject->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('section_delete')
                                    <form action="{{ route('admin.subject.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.subject.massDestroy') }}",
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