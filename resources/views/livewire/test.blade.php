<div class="container-fluid">
    <div class="h2"> Hello </div>

    <button type="button" class="btn-outline btn-sm theme-accent" wire:click="$toggle('show')">{{$text}}</button>

    <small class="opacity-0" wire:loading.class="opacity-100 fg-accent"> wait ... </small>

    @if($show)


        <div class="mx-3 my-2 h1">
            Tada...
        </div>
    @endif

    <form method="POST" action="{{ route('test.birthday') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">تاریخ تولد</label>

            @if (app()->getLocale() == 'fa')
                <input
                    type="text"
                    name="birthday"
                    class="form-control"
                    data-jdp
                    placeholder="تاریخ تولد"
                    wire:model="birthday"
                >

                @error('birthday')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            @else
                <input
                    type="date"
                    name="birthday"
                    class="form-control"
                    wire:model="birthday"
                >

                @error('birthday')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
                @enderror
            @endif
        </div>

        <button type="submit" class="btn btn-solid theme-primary">
            ثبت تاریخ
        </button>
    </form>


</div>
