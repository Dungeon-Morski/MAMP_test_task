<div class="depositOverlayBlock hidden">
    <div class="overlay">
    </div>
    <div class="modal_content">
        <form action="{{route('createUser')}}" method="post">
            @csrf
            <div>
                <label for="">Лоин</label>
                <input type="text" name="login" placeholder="Ivan1993">
            </div>
            <div>
                <label for="">Пароль</label>
                <input type="text" name="password" placeholder="I#4n19223Js">
            </div>
            <div>
                <label for="">Статус</label>
                <select name="status">
                    <option value="1">Активен</option>
                    <option value="0">Заблокирован</option>
                </select>
            </div>
            <div>
                <label for="">Роль</label>
                <select name="isAdmin">
                    <option value="1">Админ</option>
                    <option value="0">Пользователь</option>
                </select>
            </div>
            <button type="submit" class="deposit-btn">Создать</button>
        </form>
    </div>
</div>
