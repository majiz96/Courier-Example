<div class="container-fluid">
    <div class="h2"> Hello </div>

    <button type="button" class="btn-outline btn-sm theme-accent" wire:click="$toggle('show')">{{$text}}</button>

    <small class="opacity-0" wire:loading.class="opacity-100 fg-accent"> wait ... </small>

    @if($show)


        <div class="mx-3 my-2 h1">
            Tada...
        </div>
    @endif


</div>
