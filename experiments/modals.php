<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="bg-gray-900 min-h-screen">
        <table class="border border-gray-700">
            <thead class="bg-gray-900 text-gray-400 text-xs text-center font-medium uppercase tracking-wider">
                <tr class="border-b border-gray-700 text-gray-100">
                    <th colspan="6" class="px-4 py-3">Asignaciones</th>
                </tr>
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Note</th>
                    <th class="px-4 py-3">First Name</th>
                    <th class="px-4 py-3">Last Name</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700 whitespace-nowrap text-sm text-gray-400">
                <?php for ($i=1; $i <= 10; $i++) { ?>
                <tr class="hover:bg-gray-700">
                    <td class="px-4 py-2"><?= $i ?></td>
                    <td class="px-4 py-2">Admin</td>
                    <td class="px-4 py-2">Note <?= $i ?></td>
                    <td class="px-4 py-2">Christian</td>
                    <td class="px-4 py-2">Cardenas</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center justify-center text-white space-x-2">
                            <button onclick="show_modal('info',<?= $i ?>)"
                                class="bg-lime-500 hover:bg-lime-600 py-0.5 px-3 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-100">D</button>
                            <button onclick="show_modal('mod',<?= $i ?>)"
                                class="bg-indigo-500 hover:bg-indigo-600 py-0.5 px-3 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-100">M</button>
                            <button onclick="show_modal('del',<?= $i ?>)"
                                class="bg-rose-500 hover:bg-rose-600 py-0.5 px-3 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-100">X</button>
                        </div>
                    </td>
                </tr>
                <!-- modal info -->
                <div id="info_<?= $i ?>" class="hidden fixed z-10 inset-0">
                    <!-- background -->
                    <div class="fixed inset-0 bg-black opacity-50" onclick="hide_modal('info', <?= $i ?>)"></div>
                    <!-- content -->
                    <div class="flex items-center justify-center min-h-screen">
                        <!-- container -->
                        <div class="relative text-gray-100 bg-gray-900 border border-gray-700 p-4 ">
                            <div>Modal info <?= $i ?></div>
                            <button onclick="hide_modal('info', <?= $i ?>)"
                                class="bg-rose-500 hover:bg-rose-600 py-0.5 px-3 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-100">Cerrar</button>
                        </div>
                    </div>
                </div>
                <!-- modal mod -->
                <div id="mod_<?= $i ?>" class="hidden fixed z-10 inset-0">
                    <!-- background -->
                    <div class="fixed inset-0 bg-black opacity-50" onclick="hide_modal('mod', <?= $i ?>)"></div>
                    <!-- content -->
                    <div class="flex items-center justify-center min-h-screen">
                        <!-- container -->
                        <div class="relative text-gray-100 bg-gray-900 border border-gray-700 p-4 ">
                            <div>Modal mod <?= $i ?></div>
                            <button onclick="hide_modal('mod', <?= $i ?>)"
                                class="bg-rose-500 hover:bg-rose-600 py-0.5 px-3 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-100">Cerrar</button>
                        </div>
                    </div>
                </div>
                <!-- modal del -->
                <div id="del_<?= $i ?>" class="hidden fixed z-10 inset-0">
                    <!-- background -->
                    <div class="fixed inset-0 bg-black opacity-50" onclick="hide_modal('del', <?= $i ?>)"></div>
                    <!-- content -->
                    <div class="flex items-center justify-center min-h-screen">
                        <!-- container -->
                        <div class="relative text-gray-100 bg-gray-900 border border-gray-700 p-4 ">
                            <div>Modal del <?= $i ?></div>
                            <button onclick="hide_modal('del', <?= $i ?>)"
                                class="bg-rose-500 hover:bg-rose-600 py-0.5 px-3 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-100">Cerrar</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function hide_modal(modal, id) {
            modal_id = modal + "_" + id;
            console.log(modal_id);
            document.getElementById(modal_id).classList.add('hidden');
        }
        function show_modal(modal, id) {
            modal_id = modal + "_" + id;
            console.log(modal_id);
            document.getElementById(modal_id).classList.remove('hidden');
        }
    </script>

</body>

</html>