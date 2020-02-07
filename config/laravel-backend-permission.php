<?php

return [
	'url_prefix' => 'api/backend',
	/*模型*/
	'models' => [
		'user' => '\HskyZhou\LaravelBackendPermission\Repositories\Models\User',
		'permission' => '\HskyZhou\LaravelBackendPermission\Repositories\Models\Permission',
		'role' => '\HskyZhou\LaravelBackendPermission\Repositories\Models\Role',
		'menu' => '\HskyZhou\LaravelBackendPermission\Repositories\Models\Menu',
	],

	// 返回结果
	'results' => [
		'code' => [
			'show' => true,
			'label' => 'code',
		],
		'message' => [
			'show' => true,
			'label' => 'message',
		],
		'data' => [
			'show' => true,
			'label' => 'data',
		]
	],

	// 菜单
	'menu' => [
		'fields' => [
			'id' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '参数异常'
				],
			],
			'title' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '菜单名称不能为空'
				],
			],
			'icon' => [
				'resource' => true,
			],
			'url' => [
				'resource' => true,
			],
			'permission' => [
				'resource' => true,
			],
			'created_at' => [
				'resource' => true,
			],
			'updated_at' => [
				'resource' => true,
			],
			'parent_id' => [
				'resource' => false,
			],
		],
		'controllers' => [
			'info' => [
				'key_id' => 'id',
			],
			'delete' => [
				'key_id' => 'id',
			],
			'index' => [],
			'store' => [
				'params' => ['title', 'icon', 'url', 'permission', 'parent_id']
			],
			'update' => [
				'key_id' => 'id',
				'params' => ['title', 'icon', 'url', 'permission', 'parent_id']
			],
			'sort' => [
				'params' => 'menu'
			],
		],
	],

	// 权限
	'permission' => [
		'fields' => [
			'id' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '参数异常'
				],
			], 
			'name' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '名称不能为空'
				],
			],
			'show_name' => [
				'resource' => true,
			],
			'description' => [
				'resource' => true,
			],
			'guard_name' => [
				'resource' => false,
			],
			'created_at' => [
				'resource' => true,
			],
			'updated_at' => [
				'resource' => true,
			],
		],
		'controllers' => [
			'index' => [
				'searchs' => [
					'name' => [
						'param' => "search",
						'operation' => 'like',
					]
				],
			],
			'info' => [
				'key_id' => 'id'
			],
			'delete' => [
				'key_id' => 'id'
			],
			'store' => [
				'params' => ['name', 'show_name', 'description']
			],
			'update' => [
				'key_id' => 'id',
				'params' => ['name', 'show_name', 'description']
			],
		],
	],

	// 角色
	'role' => [
		'fields' => [
			'id' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '参数异常'
				],
			], 
			'name' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '名称不能为空'
				],
			],
			'guard_name' => [
				'resource' => false,
			],
			'show_name' => [
				'resource' => true,
			],
			'description' => [
				'resource' => true,
			],
			'created_at' => [
				'resource' => true,
			],
			'updated_at' => [
				'resource' => true,
			],
			'permissions' => [
				'resource' => true,
			]
		],
		'controllers' => [
			'index' => [
				'searchs' => [
					'name' => [
						'param' => "search",
						'operation' => 'like',
					],
					'show_name' => [
						'param' => "search",
						'operation' => 'like',
					],
				],
			],
			'info' => [
				'key_id' => 'id'
			],
			'delete' => [
				'key_id' => 'id'
			],
			'store' => [
				'params' => ['name', 'show_name', 'description']
			],
			'update' => [
				'key_id' => 'id',
				'params' => ['name', 'show_name', 'description']
			],
		]
	],

	// 用户
	'user' => [
		'fields' => [
			'id' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '参数异常'
				],
			], 
			'name' => [
				'resource' => true,
				'rules' => 'required',
				'messages' => [
					'required' => '姓名不能为空'
				],
			],
			'email' => [
				'resource' => true,
				'rules' => (function () {
					return [
						'required',
						\Illuminate\Validation\Rule::unique('users')->ignore(request('id')),
					];
				})(),
				'messages' => [
					'required' => '邮箱不能为空',
					'unique' => '邮箱已存在'
				],
			],
			'password' => [
				'resource' => false,
			],
			'created_at' => [
				'resource' => true,
			],
			'updated_at' => [
				'resource' => true,
			],
			'last_login_at' => [
				'resource' => true,
			],
			'last_login_ip' => [
				'resource' => true,
			],
			'status' => [
				'resource' => true,
			],
			'status_label' => [
				'resource' => true,
			],
		],
		'controllers' => [
			'index' => [
				'searchs' => [
					'name' => [
						'param' => 'search',
						'operation' => 'like',
					],
					'email' => [
						'param' => 'search',
						'operation' => 'like',
					],
				]
			],
			'info' => [
				'key_id' => 'id',
			],
			'delete' => [
				'key_id' => 'id',
			],
			'store' => [
				'params' => ['name', 'email', 'password']
			],
			'update' => [
				'key_id' => 'id',
				'params' => ['name', 'email', 'password']
			],
		]
	],
];