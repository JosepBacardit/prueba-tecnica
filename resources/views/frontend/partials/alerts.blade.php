@foreach (Alert::get() as $alert)
    <?php
    switch($alert->class){
        case "success": $alert_icon = "fa fa-check-circle";   break;
        case "info": $alert_icon = "fa fa-info-circle";   break;
        case "warning": $alert_icon = "fa fa-exclamation-triangle";   break;
        case "error": $alert_icon = "fa fa-exclamation-circle";  break;
        default: $alert_icon = "fa fa-info-circle"; break;
    }
    ?>
    <div class="alert alert-{{ $alert->class }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4 class="mb-0"><i class="{{$alert_icon}}"></i> {{ $alert->message }}</h4>
    </div>
@endforeach

@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!!  implode('', $errors->all('<h4 class="mb-0"><i class="icon fa fa-exclamation-circle"></i> :message</h4>')) !!}
    </div>
@endif

@if(isset($success))
    @if($success->any())
        <div class="alert alert-success alert-dimissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! implode('', $success->all('<h4 class="mb-0"><i class="icon fa fa-check"></i> :message</h4>')) !!}
        </div>
    @endif
@endif
