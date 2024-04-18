<form method="POST" class="flex flex-col gap-2 w-full max-w-md">
    <textarea name="text" class="rounded bg-gray-100 w-full resize px-3 py-2" placeholder="Введите текст {text}"></textarea>
    <textarea name="options" class="rounded bg-gray-100 w-full resize px-3 py-2" placeholder="Введите вариант через ','"></textarea>
    <input type="number" name="correct_number" class="rounded bg-gray-100 w-full resize px-3 py-2" placeholder="Введите индекс правильного вариант" />
    <button name="save_drag" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Сохранить и добавить</button>
</form>