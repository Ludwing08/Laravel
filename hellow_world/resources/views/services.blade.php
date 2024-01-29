@extends('layouts.landing')

@section('title', 'Servicios')

@section('body')
    <p> Et Lorem sit deserunt sit cillum culpa sint excepteur officia reprehenderit non. Incididunt culpa ad ea cillum cupidatat mollit excepteur. Consectetur dolor ut ut officia laborum laboris amet fugiat culpa do et exercitation incididunt occaecat. Laborum sit pariatur ea quis laboris occaecat ullamco ex velit magna eu labore. Ea qui sunt officia sint nisi adipisicing. Magna ut pariatur proident anim.

Elit excepteur ut proident dolor cupidatat veniam quis Lorem consequat amet excepteur velit ex magna. Non quis deserunt irure occaecat reprehenderit commodo qui dolor excepteur aliqua. Ut ad aliquip pariatur fugiat consectetur reprehenderit aliqua id. Aliqua sunt proident cupidatat ad amet. Eu labore reprehenderit fugiat qui irure aute magna ullamco occaecat ut.

Ad labore culpa dolor sint anim in qui magna enim deserunt adipisicing. Labore anim dolor laborum elit culpa voluptate tempor ut minim qui incididunt est labore consequat. Nisi irure ex et nisi sit officia eiusmod commodo quis magna voluptate culpa exercitation minim. In ea fugiat et sint consequat duis fugiat. Pariatur reprehenderit cupidatat irure eiusmod elit reprehenderit nulla veniam dolore aliqua proident consectetur amet nulla. Magna aute commodo tempor ut ipsum ad voluptate nisi eu dolor excepteur sit. </p>

    <div class="contenedor">
        @component('_components.card')  
        
        @slot('title', 'Servicio 1')
        @slot('content', 'Laborum elit sit nisi nostrud laboris exercitation.')                    
                    
        @endcomponent

        @component('_components.card')  
        
        @slot('title', 'Servicio 2')
        @slot('content', 'Laborum elit sit nisi nostrud laboris exercitation.')                    
                    
        @endcomponent

        @component('_components.card')  
        
        @slot('title', 'Servicio 3')
        @slot('content', 'Laborum elit sit nisi nostrud laboris exercitation.')                    
                    
        @endcomponent

    </div>

@endsection