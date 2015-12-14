<!--inclusion du header-->
@include('Partial/_header')
<!--inclusion de la sidebar-->
@include('Partial/_sidebar')


<section id="content_wrapper">
<!--    fil d'ariane-->
    @include('Partial/_breadscrumb')

<!--    messages flash-->
    @include('Partial/_flashdatas')
    <div id="content">

    @section('content')

    @show
    </div>
</section>


@include('Partial/_footer')