{{-- sparate action button for permission --}}
<ul class="list-group list-group-flush"><li class="list-group-item"><div class="btn-group btn-group-sm">
    <a href="{{ route('userorderDetail', [$row->id]) }}" target="_blank" type="button" class=" btn-md btn-secondary waves-effect waves-light"><i class="fa fa-info-circle" aria-hidden="true"></i> Print</a>
    {{-- <button type="button" class="btn btn-secondary waves-effect waves-light" onClick="btnEdit({{ $row->id }})"><i class="fa fa-info-circle" aria-hidden="true"></i></button> --}}
</div></li>
</ul>

