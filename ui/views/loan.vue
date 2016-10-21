<div class="col-xs-12 col-sm-4">
			<div class="well container-fluid">
				<h4>Usuario</h4>
				<div>
					<div class="input-group" v-bind:class="'has-'+[searchUser.state]">
						<span class="input-group-addon" id="user">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<input type="text" v-model="user.identification" id="identification" class="form-control" placeholder="Carnet/Cedula" aria-describedby="user"  v-on:keyup="(searchUser.state != 'default')?searchUser.state = 'default':''" v-on:keyup.enter="getUserData" :disabled="searchUser.disabled">
 	 					<span class="input-group-addon" v-if="searchUser.state == 'default'">
 	 						<i class="fa fa-search" aria-hidden="true"></i>
 	 					</span>
 	 					<span class="input-group-addon" v-if="searchUser.state == 'success'">
 	 						<i class="fa fa-check" aria-hidden="true"></i>
 	 					</span>
 	 					<span class="input-group-addon" v-if="searchUser.state == 'warning'">
 	 						<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true" ></i>
 	 					</span>
 	 					<span class="input-group-addon" v-if="searchUser.state == 'error'">
 	 						<i class="fa fa-times text-danger" aria-hidden="true" ></i>
 	 					</span>
					</div>
				</div>
				<div class="row"> 
					<div class="col-xs-12">
						<div class="btn-group pull-right" style="margin-top: 10px;margin-bottom: 10px;">
							<button class="btn btn-default" v-on:click="clearUser()" :disabled="searchUser.disabled">
								Limpiar
							</button>
							<button class="btn btn-primary" v-on:click="getUserData()" :disabled="searchUser.disabled">
								Buscar
							</button>
						</div>
					</div>
				</div>
				<div v-if="user.id == null" style="font-size: 2em;border: 1px solid #999;border-radius: 6px;" class="text-muted text-center"><i aria-hidden="true" style="font-size: 4em;" class="fa fa-user text-muted"></i> <br>
					Sin usuario seleccionado
				</div>
				<ul v-if="user.id != null" class="list-group">
				  	<li class="list-group-item">
						<b class="text-primary">Nombre:</b>
						{{user.name}} {{user.last_name}}
				  	</li>
				  	<li class="list-group-item" v-if="user.student != null">
						<b class="text-primary">Carné:</b> {{user.student.license}}
				  	</li>
				  	<li class="list-group-item">
						<b class="text-primary">Cedula:</b> {{user.identity_card}}
				  	</li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 col-sm-8">
			<div class="well container-fluid">

				<h4>Préstamo</h4>
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<select class="form-control" aria-describedby="type_loan" v-model="auto">
						  	<option value="true">Automático</option>
						  	<option value="false">Manual</option>
						</select>
					</div>
					<div class="col-xs-12 col-sm-3">
						<input type="text" class="form-control" placeholder="Fecha de devolución" aria-describedby="date" id="datePicker" :disabled="auto=='true'" v-model="return_time">
					</div>
					<div class="col-xs-12 col-sm-3">
						<select class="form-control" placeholder="Hora de devolución" aria-describedby="time" :disabled="auto=='true'">
							<optgroup v-for="n in 12">
								<option>{{n}}:00</option>
								<option>{{n}}:30</option>
							</optgroup>								   	
						</select>
					</div>
					<div class="col-xs-12 col-sm-3">
						<input type="text" class="form-control" id="barcode" placeholder="Código de barras" aria-describedby="barcode" v-model="barcode" style="text-transform:uppercase" v-on:keyup.enter="createLoan" :disabled="loan.disabled">
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-12">
						<button v-on:click="createLoan" style="margin-top: 10px;" class="btn btn-primary pull-right">
							Préstamo/Devolución
						</button>
					</div>
				</div>
			</div>
			<div class="well container-flud">
				<h4>Préstamos actuales</h4>
				<table class="table table-striped">
					<tr>
						<th>Código de barras</th>
						<th>Elemento</th>
						<th>Prestado el</th>
						<th>Devolver el</th>
						<th>Estado</th>
					</tr>
					<tr v-for="loan in currentLoans">
						<td>{{loan.loanable.barcode}}</td>
						<td></td>
						<td>{{loan.departure_time}}</td>
						<td>{{loan.return_time}}</td>
						<td>A tiempo</td>
					</tr>
					<tr v-if="currentLoans.length == 0">
						 <td colspan="5" style="font-size: 3em;border: 1px solid #999;border-radius: 6px;" class="text-muted text-center">
							<i class="fa fa-tag" aria-hidden="true"></i>
							<br>
							No se registran préstamos
						</td>
					</tr>
				</table>
			</div>
		</div>