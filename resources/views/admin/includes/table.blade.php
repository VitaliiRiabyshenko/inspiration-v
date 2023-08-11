<div class="table-wrapper" style="margin-bottom: 0; margin-top:20px; ">
    <div class="table-title">
        <div class="row">
            <div class="col align-items-end">
                <a href="{{ route($action . '.create') }}" class="btn btn-info add-new"><i class="fa fa-plus"></i>
                    Додати</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                @foreach ($data[0]['attributes'] as $key => $item)
                    @if ($key !== 'id')
                        <th scope="col"><span class="text-capitalize">{{ $key }}</span></th>
                    @endif
                @endforeach
                @foreach ($data[0]['translations'] as $locale => $items)
                    @foreach ($items as $key => $item)
                        <th scope="col"><span class="text-uppercase">{{ $locale }}</span>-<span
                                class="text-capitalize">{{ $key }}</span></th>
                    @endforeach
                @endforeach
                <th scope="col">Дія</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $translation)
                <tr>
                    @foreach ($translation['attributes'] as $key => $item)
                        <td scope="col">{{ $key === 'country' ? __('home.countries.' . $item) : $item }}
                        </td>
                    @endforeach
                    @foreach ($translation['translations'] as $items)
                        @foreach ($items as $item)
                            <td>{!! $item !!}
                            </td>
                        @endforeach
                    @endforeach
                    <td>
                        <a href="{{ route($action . '.edit', $translation['attributes']['id']) }}" class="edit"
                            title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a data-url="{{ route($action . '.destroy', $translation['attributes']['id']) }}"
                            data-id="{{ $translation['attributes']['id'] }}" class="delete remove-record" title="Delete"
                            data-target="#delete-modal" data-toggle="modal"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.includes.delete-modal')