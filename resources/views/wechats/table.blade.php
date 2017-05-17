<table class="table table-responsive" id="wechats-table">
    <thead>
        
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($wechats as $wechat)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['wechats.destroy', $wechat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('wechats.show', [$wechat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('wechats.edit', [$wechat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
