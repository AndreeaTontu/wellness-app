<x-layout title="Show the details">
    <div>
        <h1>{{$health_condition->name}}</h1> <!-- Shows health problem name -->
        <p><strong>Description: </strong>{{ $health_condition->description }}</p> <!-- Shows description -->
    </div>  
</x-layout> 