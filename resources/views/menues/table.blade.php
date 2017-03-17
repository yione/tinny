<table class="table table-responsive" id="menues-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($menues as $menues)
        <tr>
            <td>{!! $menues->name !!}</td>
            <td>
                {!! Form::open(['route' => ['menues.destroy', $menues->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('menues.show', [$menues->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('menues.edit', [$menues->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>