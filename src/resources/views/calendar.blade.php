@extends('layouts.template')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>{{ $calendar->getTitle() }}</h2>
            </div>
            <!-- <div class="card-body">
                {!! $calendar->render() !!}
            </div>  -->
        </div>
    </div>
    <a href="/calendar/redirect"><button>Googleでログイン</button></a>
    <form action="" method="">
    <div class="button-wrapper">
            <a href="/schedule">
                <i class="material-icons" style="margin-right: 8rem;">add_circle_outline</i>
            </a>
        </div>
    </form>
    <iframe src="https://calendar.google.com/calendar/embed?src=phhjeji2uirevrqqmk91i8jiho%40group.calendar.google.com&ctz=Asia%2FTokyo" style="border: 0; margin:0 0 10rem 10rem;" width="800" height="600" frameborder="0" scrolling="no"></iframe>

</div>


@endsection