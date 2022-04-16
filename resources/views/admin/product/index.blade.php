@extends('layouts.admin')
@section('content')
    <div class="block my-4">
        <a class="btn-md btn-green" href="{{ route('admin.product.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
        </a>
    </div>
    <div class="main-card">
        <div class="header">
            {{ trans('cruds.product.title') }} {{ trans('global.list') }}
        </div>

        <div class="body">
            <div class="w-full">
                <table class="stripe hover bordered datatable datatable-product">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.movie.fields.categories') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}" class="my-auto">
                            <td></td>
                            <td class="text-center">
                                {{ $product->name ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $product->price ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $product->quantity ?? '' }}
                            </td>
                            <td>
                                @foreach($product->categories as $key => $item)
                                    <span class="badge blue">{{ $item->name }}</span>
                                @endforeach
                            </td>

                            <td class="mx-auto">
                                <a class="btn-sm btn-indigo" href="{{ route('admin.product.show', $product->id) }}">
                                    {{ trans('global.view') }}
                                </a>

                                <a class="btn-sm btn-blue" href="{{ route('admin.product.edit', $product->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn-sm btn-red" value="{{ trans('global.delete') }}">
                                </form>

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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.product.massDestroy') }}",
                className: 'btn-red',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
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
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            });
            let table = $('.datatable-product:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
