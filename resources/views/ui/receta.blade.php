<div class="col-md-4 mt-4">
    <div class="card shadow">
        <img src="/storage/{{$rc->imagen}}" alt="" class="card-img-top">
        <div class="card-body">
            <h3 class="card-title">{{$rc->titulo}}</h3>
            <div class="meta-receta d-flex justify-content-between">
                @php
                    $date = $rc->created_at
                @endphp
                <p class="text-danger font-weight-bold">
                    <fecha-receta fecha="{{$date}}" ></fecha-receta>
                </p>
                <p> {{ count($rc->likes) }} les gusto </p>
            </div>
            <a href="{{ route('recetas.show', ['receta' => $rc->id]) }}" class="btn btn-outline-danger text-uppercase">Ver receta</a>
        </div>
    </div>
</div>
