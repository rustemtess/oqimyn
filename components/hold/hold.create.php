<form id="hold" method="POST" class="flex flex-col gap-2 w-full max-w-md">
    <button name="save_hold" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Сохранить и добавить</button>
</form>
<button id="add-hold" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Новый вариант</button>

<script>
    const holdDiv = document.getElementById("hold")
    document.getElementById("add-hold").addEventListener('click', () => {
        const div = document.createElement('div');
        div.classList = 'flex flex-row gap-2'
        const input = document.createElement('input')
        input.placeholder = 'Левый вариант'
        input.name = 'left[]'
        const input2 = document.createElement('input')
        input2.placeholder = 'Правый вариант'
        input2.name = 'right[]'
        input.classList = 'rounded bg-gray-100 w-full resize px-3 py-2'
        input2.classList = 'rounded bg-gray-100 w-full resize px-3 py-2'
        div.appendChild(input)
        div.appendChild(input2)
        holdDiv.appendChild(div)
    })
</script>