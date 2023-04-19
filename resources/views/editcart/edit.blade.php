<div class="form-control">
    <form action="{{route('cart.update',$watch)}}" method="post">
        @csrf
        <label>Новый число:
            <input type="number" name="count" max="3" min="1" value="{{$count}}" placeholder="Штук">
        </label>
        <label>Новый цвет:
            <select name="color" >
                <option value="Красный" @if($color == 'Красный' ) selected @endif>Красный</option>
                <option value="Чёрный" @if($color == 'Чёрный' ) selected @endif>Чёрный</option>
                <option value="Серый" @if($color == 'Серый' ) selected @endif>Серый</option>
                <option value="Белый" @if($color == 'Белый' ) selected @endif>Белый</option>
            </select>
        </label>
        <input type="hidden" name="oldcolor" value="{{$color}}">
        <input type="hidden" name="oldcount" value="{{$count}}">
        <button class="btn btn-warning" type="submit">В корзину</button>

    </form>

</div>
