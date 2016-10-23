const wss = "http://localhost:8000/";
const Prestamos = { 
	/*template: '#loan',
	/*data: {
		identification: '',
		auto: 'true',
		searchUser:{
			state: 'default',
			disabled: false,
		},
		loan:{
			state: 'default',
			disabled: false,
		},
		user: new User(),
		currentLoans:[],
		modal:{
			title:'',
			message:'',
			action:'',
			isOpen: false
		},
		barcode: '',
		return_time: ''
	},
	methods:{
		createLoan: function() {
  		//createLoan(this);
  		automaticLoan();
  	},
  	clearUser: function () {
  		this.user.clear();
  		this.searchUser.state = 'default';
  		this.currentLoans = [];
  	},
  	getUserData: function () {
  		getUserData();
  	}
  }*/
};
const UserComponent = {template: '<div>User {{ $route.params.id }}</div>'};

const router = new VueRouter({
  	routes: [
	  { path: '/prestamos', component: Prestamos },
	  { 
	  	path: '/user/:id', 
	  	component: UserComponent,
	  	watch: {
		    '$route' (to, from) {
		      console.log('to', to, 'from', from);
		    }
		} 
	  }
	]
});

const head = new Vue({
	el: "head",
	data: {
		tab: "Biblioteca"
	}
})

const app = new Vue({
  router,
  data: {
  	identification: '',
  	auto: 'true',
  	searchUser:{
  		state: 'default',
  		disabled: false,
  	},
  	loan:{
  		state: 'default',
  		disabled: false,
  	},
  	user: new User(),
  	currentLoans:[],
  	modal:{
  		title:'',
  		message:'',
  		action:'',
  		isOpen: false
  	},
  	barcode: '',
  	return_time: '',
  	hours: getHours()
  },
  methods:{
  	createLoan: function() {
  		//createLoan(this);
  		automaticLoan();
  	},
  	clearUser: function () {
  		this.user.clear();
  		this.searchUser.state = 'default';
  		this.currentLoans = [];
  	},
  	getUserData: function () {
  		getUserData();
  	}
  }
}).$mount('#app');
app.user.identification = "103620626";
$(document).ready(function () {
	$("#identification").focus();

	$('#datePicker').datepicker({
	    language: "es",
	    todayHighlight: true,
	    startDate: "today",
	});

	$('#modal').on('hidden.bs.modal', function () {
	    app.modal.isOpen = false;
	});

	$('#modal').on('show.bs.modal', function () {
	    app.modal.isOpen = true;
	});
});

function getHours() {
	var hours = [];
	var date = new Date();
	for (var i = date.getHours(); i < 24; i++) {
		hours.push(i+":00");
		hours.push(i+":30");
	}
	return hours;
}

function getUserData() {
	app.searchUser.state = 'warning';
	app.searchUser.disabled = true; 
	var xhr = $.ajax({
		method: "POST",
		dataType: 'json',
		url: wss + "search-by-identification",
		data: { 
			identification: app.user.identification
		}
	});
	xhr.done(function( msg ) {
		console.log(msg);
		if(msg != null && msg != '' && typeof msg.id == "number"){
			var user = msg;
			var date = new Date();
			if(!user.active){
				app.searchUser.state = "default";
				message("El usuario " + app.user.identification + " a sido bloqueado por un administrador del sistema", "Usuario bloqueado")
			}else if(user.next_update_time > date.sqlFormat()){
				app.searchUser.state = 'success';
				app.user.autoFill(msg);
				$( "#barcode" ).focus();
				getCurrentLoans(app.user.id);	
			}else{
				app.searchUser.state = "default";
				message("Antes de hacer un prestamo al usuario " + app.user.identification + ", bebe hacer una actualzación de datos", "Actulizar usuario", "Actualizar");
			}
			
		}else{
			var id = app.user.identification;
		   	toastr["error"]("Con la identificación: " + id, "No se encuentra en usuario");
			app.user.clear();
			app.currentLoans = [];
			app.searchUser.state = 'error';
			setTimeout(function () {
				$("#identification").focus();
			},500);
		}
			/*var date = new Date();
			user = app.user = msg;
			if(user.next_update_time > date.sqlFormat()){
				app.searchUser.state = 'success';
				$( "#barcode" ).focus();
				getCurrentLoans(user.id);
			}else{

			}
		}else{
			app.user.clear();
			app.currentLoans = [];
			app.searchUser.state = 'error';
			$("#identification").focus();
		}*/
	});
	xhr.fail(function (msg) {
		app.user.clear();
		app.searchUser.state = 'error';
		$("#identification").focus();
		message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});
	xhr.always(function (msg) {
		app.searchUser.disabled = false;
	});
}

function getUserDataById(id) {
	app.searchUser.state = 'warning';
	app.searchUser.disabled = true; 
	var xhr = $.ajax({
		method: "GET",
		dataType: 'json',
		url: wss + "users/"+id,
		data: {}
	});
	xhr.done(function( msg ) {
		console.log(msg);
		if(msg != null && msg != ''){
			app.user.autoFill(msg);
			app.searchUser.state = 'success';
			app.identification = msg.identity_card;
			getCurrentLoans(app.user.id);
		}else{
			app.user.clear();
			app.currentLoans = [];
			app.searchUser.state = 'error';
		}
	});
	xhr.fail(function (msg) {
		app.user.clear();
		app.searchUser.state = 'error';
		$("#identification").focus();
		message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});
	xhr.always(function (msg) {
		app.searchUser.disabled = false;
	});
}

function closeModal() {
	$('#modal').modal('hide');
}
function message(message, title = "Mensaje", action="Ok", actionCallback=closeModal) {
	app.modal.title = title;
	app.modal.message = message;
	app.modal.action = action;
	$('#modal').modal('show');
	tabAnimation(app.modal.title);
	$('#modal-action').off();
	$('#modal-action').click(actionCallback);
	onEnter($("#modal-action"));
}

function tabAnimation(text, oldText = head.tab) {

	head.tab = "(1) " + text;
	setTimeout(function () {
		head.tab = oldText;
	}, 2000);
	setTimeout(function () {
		if(app.modal.isOpen){
			tabAnimation(text, oldText);
		}
	}, 4000);
	
}

function onEnter(element) {
	$(document).keypress(function(e) {
	    if(e.which == 13) {
	        element.click();
	    }
	});
}

function getCurrentLoans(id) {
	var xhr = $.ajax({
	  	method: "GET",
        dataType: 'json',
	  	url: wss + "loan-by-id",
	  	data: { 
	  		id: id
	  	}
	});
	xhr.done(function( msg ) {
	    console.log(msg);
    	if(msg != null && msg != ''){
	    	app.currentLoans = msg;
	    }else{
	    	console.log("the  loans are empty");
	    }
	});
	xhr.fail(function (msg) {
	    app.user.clear();
		app.searchUser.state = 'error';
	    $("#identification").focus();
	    message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});
	xhr.always(function (msg) {
		//app.searchUser.disabled = false;
	});
}

function createLoan(app) {
	var xhr = $.ajax({
	  	method: "POST",
        dataType: 'json',
	  	url: wss + "loan",
	  	data: { 
	  		user_id: app.user.id,
	  		return_time: "2016-10-16 02:00:00",
	  		barcode: app.barcode
	  	}
	});
	xhr.done(function( msg ) {
	    console.log('msg',msg,'msg.loanable',msg.loanable);
    	app.currentLoans.push(msg);
    	app.barcode = '';
    	$( "#barcode" ).focus();
	});
	xhr.fail(function (msg) {
	   
	    message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});
	xhr.always(function (msg, asd) {
		//app.searchUser.disabled = false;
		console.log('Always msg = ', msg, " asd = ", asd)
	});
}

function login(email, password) {
	var xhr = $.ajax({
	  	method: "GET",
        dataType: 'json',
	  	url: wss + "login",
	  	data: { 
	  		email: email,//'diegojopiedra@gmail.com',
	  		password: password// "1234"
	  	}
	});
	xhr.done(function( msg ) {
	    console.log(msg);
    	
	});
	xhr.fail(function (msg) {
	   
	    message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});

}

function gets() {
	function myFunction(data) {
		console.log("callback data= ", data);
	}
	var xhr = $.ajax({
	  	method: "GET",
        dataType: 'json',
	  	url: wss + "gets",
	  	data: {},
	  	crossDomain: true,
    	contentType: 'application/json; charset=utf-8',
    	success: function (msg) {
    		console.log("Success = ", msg)
    	},
    	error: function (msg, error, desc) {
    		console.log("Error = ", msg, " error = ", error, " desc = ", desc)
    	}
	});
	/*xhr.done(function( msg ) {
	    console.log("OK = ", msg);
    	
	});
	xhr.fail(function (msg,a,b) {
	   console.log("Fail = ", msg, a, ' - ', b);
	    message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});*/

}

function returnLaon(barcode) {
	var xhr = $.ajax({
	  	method: "POST",
        dataType: 'json',
	  	url: wss + "return-loan",
	  	data: { 
	  		barcode: barcode 
	  	}
	});
	xhr.done(function( msg ) {
	    console.log('return-loan',msg);
	   	for (var i = 0; i < app.currentLoans.length; i++) {
	   		var item = app.currentLoans[i];
	   		if(item.id == msg.id){
	   			app.currentLoans.splice(i, 1);
	   			ready = true;
	   		}
	   	}

	   	if(app.user.id == null){
	   		getUserDataById(msg.user_id);
	   	}
	});
	xhr.fail(function (msg) {
	   
	    message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});
	xhr.always(function (msg, asd) {
		//app.searchUser.disabled = false;
		console.log('Always msg = ', msg, " asd = ", asd)
	});
}

function automaticLoan() {
	app.loan.disabled = true;
	var xhr = $.ajax({
	  	method: "POST",
        dataType: 'json',
	  	url: wss + "automatic-loan",
	  	data: { 
	  		user_id: app.user.id,
	  		return_time: "2016-10-16 02:00:00",
	  		barcode: app.barcode
	  	}
	});

	xhr.done(function( msg ) {
	    console.log('user_return_time', msg.user_return_time, 'return_time', msg.return_time);
	    
		app.loan.disabled = false;
	    if(msg.response != null && msg.response == "empty"){
	    	message("No se encuentra este código de barras en el sistema");
	    }else  if(msg.response != null && msg.response == "not available"){
	    	message("El activo no se puede prestar en este momento");
	    }else if(msg.user_return_time == null){
	    	toastr["success"]("Placa: " + msg.loanable.barcode, "Préstamo exitoso");
	    	app.currentLoans.push(msg);
	    }else if(msg.user_return_time <= msg.return_time){ 
		   	toastr["success"]("Placa: " + msg.loanable.barcode, "Devolución exitosa")
	    	for (var i = 0; i < app.currentLoans.length; i++) {
		   		var item = app.currentLoans[i];
		   		if(item.id == msg.id){
		   			app.currentLoans.splice(i, 1);
		   		}
		   	}
	    }else{
		   	toastr["error"]("Placa: " + msg.loanable.barcode, "Devolución tardría")
	    	for (var i = 0; i < app.currentLoans.length; i++) {
		   		var item = app.currentLoans[i];
		   		if(item.id == msg.id){
		   			app.currentLoans.splice(i, 1);
		   		}
		   	}
	    }
	    app.barcode = '';
	    $( "#barcode" ).focus();

	   	if(app.user.id == null){
	   		getUserDataById(msg.user_id);
	   	}else if(app.user.id != msg.user_id){
	   		getUserDataById(msg.user_id);
	   		toastr["info"]("Se ha cambiado de usuario para realizar la operación")
	   	}

	    setTimeout(function () {
	    	$( "#barcode" ).focus();
	    },500);
	});
	xhr.fail(function (msg) {
	  
	});
	xhr.always(function (msg, asd) {
		console.log('Always automatic-loan = ', msg, " asd = ", asd)
	});
}

Date.prototype.sqlFormat = function() {
  var mm = this.getMonth() + 1; // getMonth() is zero-based
  var dd = this.getDate();

  return [this.getFullYear(), !mm[1] && '-', mm, !dd[1] && '-', dd].join(''); // padding
};


function User(id, name, last_name, email, identity_card, birthdate, home_phone, cell_phone, next_update_time, active, role_id, identification, student) {
	this.id = id;
	this.name = name;
	this.last_name = last_name;
	this.email = email;
	this.identity_card = identity_card;
	this.birthdate = birthdate;
	this.home_phone = home_phone;
	this.cell_phone = cell_phone;
	this.next_update_time = next_update_time;
	this.active = active;
	this.role_id = role_id;
	this.student = student;
	this.identification = identification;

	this.autoFill = function (obj) {
		for(property in this){
			if(obj.hasOwnProperty(property) && typeof this[property] != 'function'){
				this[property] = obj[property];
			}
		}
	}

	this.clear = function () {
		for(property in this){
			if(typeof this[property] != 'function' && property != 'ajaxFillBy')
				this[property] = null;
		}
	}

	this.ajaxFillBy = {
		parent: this,
		identification: function (identification) {
			var xhr = $.ajax({
				method: "POST",
				dataType: 'json',
				url: wss + "search-by-identification",
				data: { 
					identification: identification
				},
				context: this.parent
			});

			xhr.done(function (response) {
				this.autoFill(response);
			});
		}
	}
}

function Prueba(){
	// $.ajax({
	// 	url: "loginPrueba",
	// 	dataType: "json",
	// 	type: "POST",
	// 	data: {"email":"diegojopiedra@gmail.com","password":"1234"},
	// 	success: function (data) {
	// 		alert("user created successfully")
	// 	}
	// });

	var xhr = $.ajax({
	  	method: "GET",
        dataType: 'json',
	  	url: wss + "loginPrueba",
	  	data: { 
	  		email:'diegojopiedra@gmail.com',
	  		password: "1234",
	  		//token: 'eyJpdiI6IlwvWmJZM2dqQ3F3UkhMTU5cL0k3Z2psQT09IiwidmFsdWUiOiJCaWxoMEJRTjdTa0djTWdcL2tCVml1QzBabU5xYjY4NEM4UXJhWXNxQ2JPSDFacGozOGNQM1dkRTFqd0dpQzZNeVBQVmNxUGx2NEVVMDllNTAydlY3U1E9PSIsIm1hYyI6IjVjMGZmN2I2NDY4NzVmYTc0MzYyMGZiYzI5MmNlZTYzZGY0ODUxNDIwYTRiYmRmN2RiMTNlODZhNzliMmY3YzEifQ'
	  	}
	});
	xhr.done(function( msg ) {
	    console.log(msg);
    	
	});
	xhr.fail(function (msg) {
	   
	    message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
	});
}
