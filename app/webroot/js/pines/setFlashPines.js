var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};

function show_stack_bar_top(type,mensagem) {
	$.pnotify.defaults.history = false;

	var opts = {
		title: "Over Here",
		text: "Check me out. I'm in a different stack.",
		addclass: "stack-bar-top",
		cornerclass: "",
		width: "100%",
		sticker: false,
		delay: 5000,
		hide: true,
		stack: stack_bar_top
	};
	switch (type) {
		case 'error':
			opts.title = "Erro";
			opts.type = "error";
			break;
		case 'info':
			opts.title = "Informação";
			opts.type = "notice";
			break;
		case 'success':
			opts.title = "Sucesso";
			opts.type = "success";
			break;
		case 'notice':
			opts.title = "Aviso";
			opts.type = "info";
			break;
	}
	opts.text = mensagem;
	$.pnotify(opts);
};