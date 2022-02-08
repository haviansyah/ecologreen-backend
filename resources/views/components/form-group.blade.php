@php
    if (!function_exists('getId')) {
        function getId($opt, $select_id = null){
            if($select_id){
                return ($select_id instanceof Closure) ? $select_id($opt) : $opt->{$select_id};
            }else{
                return $opt->id;
            }
        }
    }
@endphp
@php
$val = (request()->get($name) ?? (old($name) ?? ($value ?? (isset($data) ? $data->$name : "")) ));
$val = is_array($val) ? json_encode($val) : $val;
// $val = $type == "date" && $val === null ? \Carbon\Carbon::now() : $val;

$val = $val instanceof \Carbon\Carbon ? $val->format('Y-m-d') : $val; 
@endphp
<div class="form-group">
    <label class="@error($name) text-danger @enderror">{{ $title ?? Str::ucfirst($name) }}</label>

    {{-- SELECT --}}
    @if($type == "select")
        <select data-placeholder="{{$placeholder ?? ''}}" name="{{$name}}" @isset($multiple) multiple='multiple' @endisset class="form-control select2 @error($name) is-invalid @enderror"  
        @isset($required)
            required
        @endisset>
            <option></option>
        
            @foreach ($options as $option)
                @isset($plain)
                    <option value="{{$option}}" @if( (request()->get($name) ?? ($value ?? (isset($data) ? $option : old($name)))) == $option ?? null) ) selected @endif>{{$option}}</option>

                @else
                    <option value="{{getId($option,$select_id ?? null)}}" @if( (request()->get($name) ?? ($value ?? (isset($data) ? $data->$name : old($name)))) == getId($option,$select_id ?? null) ) selected @endif>{!! ($select_name instanceof Closure) ? $select_name($option) : $option->{$select_name} !!}</option>
                @endisset
            
            @endforeach
        </select>
     

    {{-- RADIO BUTTON --}}
    @elseif($type == "radio")
        <div class="btn-group-toggle" data-toggle="buttons">
            @foreach ($options as $option)
                <label class="btn btn-outline-success  @if( (request()->get($name) ?? ($value ?? (isset($data) ? $data->$name : old($name)))) === getId($option,$select_id ?? null) ) active @endif">
                    <input 
                    @isset($required)
                        required
                    @endisset
                    type="radio" name="{{$name}}" value="{{getId($option,$select_id ?? null)}}" autocomplete="off"  @if( (request()->get($name) ?? ($value ?? (isset($data) ? $data->$name : old($name)))) === getId($option,$select_id ?? null) ) checked @endif> {{ ($select_name instanceof Closure) ? $select_name($option) : $option->{$select_name} }}
                </label>
            @endforeach
        </div>

    {{-- FILE --}}
    @elseif($type == "file")
    <div class="custom-file">
        <input name="{{$name}}" type="{{$type ?? 'text'}}" class="{{ $type == "file" ? "custom-file-input" : "form-control"}}  @error($name) is-invalid @enderror" id="input-{{$name}}"
        value="{{(request()->get($name) ?? ($value ?? (isset($data)) ? $data->$name : old($name)))}}"
        id='{{$id ?? ''}}'
        @isset($required)
        required
        @endisset
        @isset($attributes)
            @foreach($attributes as $key => $value)
                {{$key}}="{{$value}}""
            @endforeach
        @endisset
        >
        <label class="custom-file-label" for="input-{{$name}}">{{$placeholder ?? 'Masukkan '.($title ?? Str::ucfirst($name)) }}</label>
    </div>
   
    {{-- TEXTAREA --}}
    @elseif($type == "textarea")
        <textarea  @isset($required)
        required
    @endisset autocomplete="off" name="{{$name}}" class="{{ $type == "file" ? "custom-file-input" : "form-control"}}  @error($name) is-invalid @enderror" id="input-{{$name}}"
        placeholder="{{$placeholder ?? 'Masukkan '.($title ?? Str::ucfirst($name))}}">{{ $val }}</textarea>
    
    @elseif($type == 'input-group')
    <div class="input-group mb-2 mr-sm-2">
    
        <input autocomplete="off" name="{{$name}}" type="{{$type ?? 'text'}}" class="{{ $type == "file" ? "custom-file-input" : "form-control"}}  @error($name) is-invalid @enderror" id="input-{{$name}}"
        placeholder="{{$placeholder ?? 'Masukkan '.($title ?? Str::ucfirst($name))}}"
        @if($type == 'number')
            step=".01"
        @endif
        @isset($required)
            required
        @endisset
        value="{{ $val }}">
        {!! $input_button ?? '<button class="btn btn-primary input-group-prepend" id="btn-'.$name.'">Generate</button>' !!}
    </div>
   
    @else
    {{-- TEXT --}}
    <input name="{{$name}}" type="{{$type ?? 'text'}}" class="{{ $type == "file" ? "custom-file-input" : "form-control"}}  @error($name) is-invalid @enderror" id="input-{{$name}}"
        placeholder="{{$placeholder ?? 'Masukkan '.($title ?? Str::ucfirst($name))}}"
        @isset($required)
            required
        @endisset
        @isset($attributes)
            @foreach($attributes as $key => $value)
                {{$key}}="{{$value}}""
            @endforeach
        @endisset
       
        @if($type == 'date')
            @if(isset($max))
            max="{{$max}}"
            @else
            max="{{Carbon\Carbon::now()->format('Y-m-d')}}"
            @endif
        @endif
        value="{{ $val }}">
    @endif
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
    @isset($info)
        <small class="text-secondary">{{$info}}</small>
    @else
        @isset($required)@else
        <small class="text-secondary">Opsional</small>
        @endisset
    @endisset
</div>

