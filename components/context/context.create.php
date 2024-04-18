<form method="POST" class="flex flex-col gap-2 w-full max-w-md">
    <textarea name="title" class="rounded bg-gray-100 w-full resize px-3 py-2" placeholder="Введите заголовок"></textarea>
    <textarea name="content" class="rounded bg-gray-100 w-full resize px-3 py-2" placeholder="Введите текст"></textarea>
    <input name="image_url" class="rounded bg-gray-100 w-full px-3 py-2" placeholder="Введите url картинки"></textarea>
    <select name="lang" class="bg-slate-200 px-4 py-2 rounded text-slate-900 font-normal">
        <option selected disabled value="kz">Выберите язык</option>
        <option value="kz">Казахский</option>
        <option value="ru">Русский</option>
    </select>
    <button name="save_context" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Сохранить и добавить</button>
</form>