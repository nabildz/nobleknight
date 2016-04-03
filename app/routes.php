<?php

return  [

    // Hello

        ['GET', '/{id:\d+}', ['Home', 'index']],
        ['GET', '/insert', ['Home', 'test']],
        ['POST', '/insert2', ['Home', 'showtest']],

    // Todos

        ['GET', '/todos', ['TodosController', 'get']],
        ['POST', '/todos', ['TodosController', 'post']],
        ['GET', '/todos/{id:\d+}', ['TodosController', 'show']],

        ];
