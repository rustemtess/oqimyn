<?

if($userPermissionName == 'admin') {
    ?>
    <div class="flex flex-col items-center justify-center stretch w-full h-full gap-8" style="background-color: rgba(28, 25, 23, 0.6);">
        <?
        include_once './components/create-component/create-component.action.php';
        ?>
        <form method="POST" class="flex flex-col gap-2">
            <select name="component_name" class="bg-slate-200 px-4 py-2 rounded text-slate-900 font-normal">
                <option selected disabled>Выберите новый компонент</option>
                <option value="context">Заголовок и текст</option>
                <option value="description">Задание и перевод</option>
                <option value="simple">Простой текст</option>
                <option value="read">Задача с озвучиванием</option>
                <option value="drag">Задача с перетаскиванием</option>
                <option value="hold">Задача с сравнением</option>
            </select>
            <button name="create" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Создать</button>
            <button name="close" class="cursor-pointer bg-orange-600 px-3 py-2 text-slate-50 rounded text-lg w-inherit h-fit hover:bg-orange-500">Закрыть редактор</button>
        </form>
    </div>
    <?
}

?>