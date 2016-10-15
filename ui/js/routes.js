const wss = "http://localhost:8000/";
const Prestamos = { template: '<div>prestamos</div>' };
const User = {template: '<div>User {{ $route.params.id }}</div>'};

const router = new VueRouter({
  	routes: [
	  { path: '/prestamos', component: Prestamos },
	  { 
	  	path: '/user/:id', 
	  	component: User,
	  	watch: {
		    '$route' (to, from) {
		      console.log('to', to, 'from', from);
		    }
		} 
	  }
	]
});

const app = new Vue({
  router,
  data: {
  	identification: '',
  	auto: 'true',
  	searchUser:{
  		state: 'default',
  		disabled: false,
  	},
  	user:{},
  	currentLoans:[],
  	modal:{
  		title:'',
  		message:'',
  		action:''
  	},
  	barcode: ''
  },
  methods:{
  	createLoan: function() {
  		createLoan(this);
  	},
  	clearUser: function () {
  		this.user = {};	
  		this.identification = '';
  		this.searchUser.state = 'default';
  		this.currentLoans = [];
  	},
  	getUserData: function () {
  		this.searchUser.state = 'warning';
  		this.searchUser.disabled = true; 
  		var xhr = $.ajax({
		  	method: "POST",
        	dataType: 'json',
		  	url: wss + "search-by-identification",
		  	data: { 
		  		identification: this.identification
		  	}
		});
		xhr.done(function( msg ) {
		    console.log(msg);
	    	if(msg != null && msg != ''){
		    	app.user = msg;
				app.searchUser.state = 'success';
		    	$( "#barcode" ).focus();
		    	getCurrentLoans(app.user.id);
		    }else{
		    	app.user = {};
  				app.currentLoans = [];
		    	app.searchUser.state = 'error';
		    	$("#identification").focus();
		    }
		});
		xhr.fail(function (msg) {
		    app.user = {};
			app.searchUser.state = 'error';
		    $("#identification").focus();
		    message("Existe un error de comunicación con el servidor, por favor reintente la ultima acción. Si el problema persiste solicite soporte técnico", "¡Ha ocurrido un inconveniente!");
		});
		xhr.always(function (msg) {
  			app.searchUser.disabled = false;
		});
  	}
  }
}).$mount('#app');
$(document).ready(function () {
	$("#identification").focus();
});

function closeModal() {
	$('#modal').modal('hide');
}
function message(message, title = "Mensaje", action="Ok", actionCallback=closeModal) {
	app.modal.title = title;
	app.modal.message = message;
	app.modal.action = action;
	$('#modal').modal('show');
	$('#modal-action').off();
	$('#modal-action').click(actionCallback);
	onEnter($("#modal-action"));
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
	    app.user = {};
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
	  		departure_time: "2016-10-15 02:00:00",
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
	   		}
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