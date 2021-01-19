@extends('admin.layout.master')

@section('title','Admin Dashboard')

@section('content')
<form>
       <!--Using blow when from has no action and submit-->
    <input type="hidden" name="_token" value="{{csrf_token()}}" class="form-control">
    <input type="text" id="search" class="form-control" placeholder="Search Products.......">
    <div class="show-result"></div>
</form>

@endsection

<script src="{{asset('backend/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
        var key =$(this).val();
        if(key !=''){
            //Ajax
            $.ajax({
                url: "{{route('search.products')}}", //Action
                method: "POST",                     //method
                data: {
                    '_token' : "{{ csrf_token() }}",
                    'K' : key
            },
                success:function(response){
                    $('.show-result').show();
                    $('.show-result').html(response);
            }
            });

        }
        else{
            $('.show-result').hide();
        }
        });
    });
</script>
