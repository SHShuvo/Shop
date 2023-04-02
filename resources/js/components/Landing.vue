<template>
	<div class="landing">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">Shop Management</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#food">Food</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#candle">Candle</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#contact_us">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#about_us">About Us</a>
						</li>
					</ul>
					<template v-if="!loading">
						<li v-if="login_status" class="nav-item ms-auto" style="list-style:none">
							<router-link to="/admin/" class="nav-link" aria-current="page">Dashboard</router-link>
						</li>
						<li v-else class="nav-item ms-auto" style="list-style:none">
							<button style="position:relative; z-index:99;" @click.prevent="loginModal" class="btn btn-sm btn-outline-warning mt-1">Login</button>
						</li>
					</template>
				</div>
			</div>
		</nav>

		<div id="food" class="image-container">
			<img src="/img/food.jpg" alt="Full-screen image">
			<div class="shadow"></div>
			<div class="img-caption">
				<div class="title">Indian Food</div>
				<div class="description">House of Indian food in Canada</div>
				<button class="btn-img btn btn-outline-warning btn-lg">Learn more</button>
			</div>
		</div>
		<div style="margin-top:80px" id="candle" class="image-container">
			<img src="/img/candle.jpg" alt="Full-screen image">
			<div class="shadow"></div>
			<div class="img-caption">
				<div class="title">Premium Candle</div>
				<div class="description">House of Premium food in Canada</div>
				<button class="btn-img btn btn-outline-warning btn-lg">Learn more</button>
			</div>
		</div>
		<div id="contact_us" class="contact">
			<div class="row">
				<div class="col-md-4 contact-address">
					<h4 class="mb-3 fw-bold" style="color:">Let's get in touch</h4>
					<div class="d-box">
						<div class="dbox w-100 d-flex align-items-center mb-2">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="text ps-3">
								<p class="mb-0"><span>Address:</span> 198 West 21th Street, Robson Street, Vancouver, British Columbia.</p>
							</div>
						</div>
						<div class="dbox w-100 d-flex align-items-center mb-2">
							<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-phone"></span>
							</div>
							<div class="text ps-3 mt-auto">
							<p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex align-items-center mb-2">
							<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text ps-3 mt-auto">
							<p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex align-items-center">
							<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-globe"></span>
							</div>
							<div class="text ps-3 mt-auto">
							<p><span>Website</span> <a href="#">yoursite.com</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 contact-form">
					<h4 class="mb-3 fw-bold">Get in touch</h4>
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" v-model="messageForm.name" class="form-control form-control-sm" required>
					</div>
					<div class="form-group mt-2">
						<label for="email">Email:</label>
						<input type="email" v-model="messageForm.email" class="form-control form-control-sm" required>
					</div>
					<div class="form-group mt-2">
						<label for="message">Message:</label>
						<textarea v-model="messageForm.message" class="form-control form-control-sm" rows="5" required></textarea>
					</div>
					<div class="d-flex justify-content-end">
						<button @click.prevent="submitMessage" class="btn btn-sm btn-success mt-2 float-right">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<div id="about_us" class="footer">
			<div class="row">
				<div class="col-md-8">
					<div class="footer-title">
						About Us
					</div>
					<div>
						<p>At our candle and food shop, we strive to create a welcoming and cozy atmosphere for all of 
							our customers. Whether you're looking for a delicious treat or a relaxing scent to fill 
							your home, we've got you covered.
						</p>
						<p>
							When it comes to our food selection, we pride ourselves on using only the freshest and 
							highest quality ingredients. From freshly baked bread to homemade pastries, everything 
							is made with love and care. We also offer a variety of savory options, such as sandwiches 
							and salads, for those looking for a quick and healthy meal.
						</p>
						<p>
							Our candle selection is equally impressive, with a wide range of scents and styles to 
							choose from. Whether you prefer fruity, floral, or earthy scents, we've got something 
							for everyone. We also offer a variety of candle sizes, so you can find the 
							perfect fit for your home or office.
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="footer-title">
						Links
					</div>
					<div>
						<ul class="footer-social social-icons grid__item inline-list">
							<li>
								<a href="" title="Facebook" target="_blank">	
								<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-facebook" viewBox="0 0 20 20"><path fill="#444" d="M18.05.811q.439 0 .744.305t.305.744v16.637q0 .439-.305.744t-.744.305h-4.732v-7.221h2.415l.342-2.854h-2.757v-1.83q0-.659.293-1t1.073-.342h1.488V3.762q-.976-.098-2.171-.098-1.634 0-2.635.964t-1 2.72V9.47H7.951v2.854h2.415v7.221H1.413q-.439 0-.744-.305t-.305-.744V1.859q0-.439.305-.744T1.413.81H18.05z"></path></svg>
								<span class="visually-hidden">Facebook</span>
								</a>
							</li>
							<li>
								<a href="" title="Twitter" target="_blank">
										
								<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-twitter" viewBox="0 0 20 20"><path fill="#444" d="M19.551 4.208q-.815 1.202-1.956 2.038 0 .082.02.255t.02.255q0 1.589-.469 3.179t-1.426 3.036-2.272 2.567-3.158 1.793-3.963.672q-3.301 0-6.031-1.773.571.041.937.041 2.751 0 4.911-1.671-1.284-.02-2.292-.784T2.456 11.85q.346.082.754.082.55 0 1.039-.163-1.365-.285-2.262-1.365T1.09 7.918v-.041q.774.408 1.773.448-.795-.53-1.263-1.396t-.469-1.864q0-1.019.509-1.997 1.487 1.854 3.596 2.924T9.81 7.184q-.143-.509-.143-.897 0-1.63 1.161-2.781t2.832-1.151q.815 0 1.569.326t1.284.917q1.345-.265 2.506-.958-.428 1.386-1.732 2.18 1.243-.163 2.262-.611z"></path></svg>
								<span class="visually-hidden">Twitter</span>
								</a>
							</li>
							<li>
								<a href="" title="Tiktok" target="_blank">
					
								<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-tiktok" viewBox="0 0 19 19"><path d="M12.917 1c.289 2.412 1.674 3.85 4.083 4.004v2.713c-1.396.133-2.619-.311-4.04-1.148v5.075c0 6.447-7.232 8.461-10.14 3.84-1.867-2.973-.723-8.19 5.27-8.4v2.862a8.879 8.879 0 00-1.391.331c-1.333.439-2.089 1.26-1.879 2.708.404 2.775 5.641 3.596 5.206-1.825V1.005h2.891V1z" fill="#000" fill-rule="evenodd"></path></svg>
								<span class="visually-hidden">Tiktok</span>
								</a>
							</li>
							<li>
								<a href="" title="Pinterest" target="_blank">
								
								<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-pinterest" viewBox="0 0 20 20"><path fill="#444" d="M9.958.811q1.903 0 3.635.744t2.988 2 2 2.988.744 3.635q0 2.537-1.256 4.696t-3.415 3.415-4.696 1.256q-1.39 0-2.659-.366.707-1.147.951-2.025l.659-2.561q.244.463.903.817t1.39.354q1.464 0 2.622-.842t1.793-2.305.634-3.293q0-2.171-1.671-3.769t-4.257-1.598q-1.586 0-2.903.537T5.298 5.897 4.066 7.775t-.427 2.037q0 1.268.476 2.22t1.427 1.342q.171.073.293.012t.171-.232q.171-.61.195-.756.098-.268-.122-.512-.634-.707-.634-1.83 0-1.854 1.281-3.183t3.354-1.329q1.83 0 2.854 1t1.025 2.61q0 1.342-.366 2.476t-1.049 1.817-1.561.683q-.732 0-1.195-.537t-.293-1.269q.098-.342.256-.878t.268-.915.207-.817.098-.732q0-.61-.317-1t-.927-.39q-.756 0-1.269.695t-.512 1.744q0 .39.061.756t.134.537l.073.171q-1 4.342-1.22 5.098-.195.927-.146 2.171-2.513-1.122-4.062-3.44T.59 10.177q0-3.879 2.744-6.623T9.957.81z"></path></svg>
								<span class="visually-hidden">Pinterest</span>
								</a>
							</li>
							<li>
								<a href="" title="Instagram" target="_blank">
										
								<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-instagram" viewBox="0 0 20 20"><path d="M10.034 1.763h2.644c.407 0 .881 0 1.424.068.474 0 .881.067 1.152.135.271.068.543.136.678.203.271.068.475.204.61.34.136.135.34.27.543.406.203.204.339.34.407.543.067.203.203.406.339.61.067.203.135.407.203.678.068.27.135.678.135 1.152 0 .543.068 1.017.068 1.424v5.288c0 .407 0 .882-.068 1.424 0 .474-.067.881-.135 1.152-.068.272-.136.543-.203.678a1.31 1.31 0 01-.34.61c-.135.204-.27.34-.406.543-.204.203-.34.339-.543.407a2.38 2.38 0 01-.61.27 7.737 7.737 0 01-.678.204 4.868 4.868 0 01-1.152.136c-.543 0-1.017.068-1.424.068H7.39c-.407 0-.882 0-1.424-.068-.474 0-.881-.068-1.152-.136-.272-.067-.543-.135-.678-.203-.272-.068-.475-.203-.61-.271-.204-.136-.34-.271-.543-.407-.203-.203-.339-.339-.407-.542-.135-.204-.203-.407-.339-.61a8.558 8.558 0 01-.203-.679 4.868 4.868 0 01-.136-1.152c0-.542-.067-1.017-.067-1.424V7.322c0-.407 0-.881.067-1.424 0-.474.068-.881.136-1.152.068-.271.135-.543.203-.678.068-.204.204-.407.34-.61.135-.204.27-.34.406-.543.203-.203.339-.339.542-.407.204-.135.407-.203.61-.339.204-.067.407-.135.679-.203a4.868 4.868 0 011.152-.135c.542 0 1.017-.068 1.424-.068h2.644zm0-1.763H7.322c-.407 0-.881 0-1.424.068-.542 0-1.017.068-1.356.135-.406.068-.745.204-1.084.34-.34.135-.61.27-.95.474-.27.203-.542.407-.813.678-.271.271-.542.542-.678.881-.136.34-.339.543-.475.882-.135.339-.27.678-.339 1.084a6.993 6.993 0 00-.135 1.356C0 6.441 0 6.915 0 7.322v5.356c0 .407 0 .881.068 1.424 0 .542.068 1.017.135 1.356.068.406.204.745.34 1.084.135.34.27.61.474.95.203.27.407.542.678.813.271.271.542.475.813.678.272.203.61.339.95.475.339.135.678.203 1.084.339.407.067.814.135 1.356.135.543 0 1.017.068 1.424.068h5.424c.407 0 .881 0 1.423-.068.543 0 1.017-.068 1.356-.135.407-.068.746-.204 1.085-.34.34-.135.61-.27.95-.474.27-.203.542-.407.88-.678.272-.271.475-.542.679-.881.203-.271.339-.61.474-.882.136-.339.204-.678.271-1.084.068-.407.136-.814.136-1.424 0-.542.068-1.017.068-1.424V7.254c0-.407 0-.881-.068-1.423 0-.543-.068-1.017-.136-1.424-.067-.407-.203-.746-.27-1.085a6.199 6.199 0 00-.475-.95c-.204-.338-.407-.541-.678-.813a4.353 4.353 0 00-.882-.678c-.27-.203-.61-.339-.949-.474-.339-.136-.678-.271-1.085-.34-.406-.067-.813-.135-1.356-.135h-1.423C12.27 0 11.39 0 10.034 0zm0 4.881c-.746 0-1.356.136-2.034.407-.61.271-1.153.61-1.627 1.085C5.898 6.847 5.559 7.39 5.288 8a4.863 4.863 0 00-.407 1.966c0 .746.136 1.356.407 2.034.271.61.61 1.153 1.085 1.627.474.475 1.017.814 1.627 1.085.61.271 1.288.407 2.034.407.746 0 1.356-.136 2.034-.407a4.57 4.57 0 001.627-1.085c.474-.474.813-1.017 1.085-1.627.27-.61.406-1.288.406-2.034 0-.678-.135-1.356-.406-1.966-.272-.61-.61-1.153-1.085-1.627-.475-.475-1.017-.814-1.627-1.085-.61-.271-1.356-.407-2.034-.407zm0 8.475c-.95 0-1.695-.34-2.373-.95-.678-.677-.95-1.423-.95-2.372 0-.881.34-1.695.95-2.373.61-.678 1.424-1.017 2.373-1.017.949 0 1.695.339 2.373 1.017.678.678.949 1.424.949 2.373 0 .949-.34 1.695-.95 2.373-.677.61-1.49.949-2.372.949zm6.508-8.678c0-.339-.135-.61-.339-.814a1.25 1.25 0 00-.813-.339c-.34 0-.61.136-.814.34a1.25 1.25 0 00-.339.813c0 .271.136.61.34.881.203.272.542.34.813.34.339 0 .61-.136.813-.34.204-.27.34-.61.34-.881z"></path></svg>
								<span class="visually-hidden">Instagram</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="myModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Login</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row justify-content-center">
						<div class="col-md-12">
							<form>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" v-model="email" class="form-control form-control-sm" id="email" placeholder="Enter email" required>
								</div>
								<div class="form-group mt-3">
									<label for="password">Password</label>
									<input type="password" v-model="password" class="form-control form-control-sm" id="password" placeholder="Password" required>
								</div>
								<button @click.prevent="submitForm" class="btn btn-sm w-100 btn-primary mt-3">Login</button>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { Modal } from 'bootstrap';
export default {
	data() {
		return {
			email: '',
			password: '',
			myModal:{},
			messageForm:{
				name:'',
				email:'',
				message:''
			},
			loading:false,
			login_status:false
		};
	},
	methods: {
		async submitMessage(){
			try {
				const {data} = await axios.post('/create-message',this.messageForm);
				this.messageForm.name='';
				this.messageForm.email='';
				this.messageForm.message='';
				toast.fire({
					icon: 'success',
					title: 'Message Delivered'
				});
			} 
			catch (error) {
				toast.fire({
					icon: 'error',
					title: 'Something went wrong'
				});
			}
		},
		async submitForm() {
			try {
				const {data} = await axios.post('/login', {
					email:this.email,
					password: this.password
				});
				this.login_status = true;
				await this.myModal.hide();
				await localStorage.setItem('user_name', data.user.name);
				await localStorage.setItem('user_id', data.user.id);
				await localStorage.setItem('user_role', data.user.role_id);
                this.$router.push({ name: 'contact_posts' });

				toast.fire({
					icon: 'success',
					title: 'Successfully Logged In'
				});
			} 
			catch (error) {
				this.removeUser();
				toast.fire({
					icon: 'error',
					title: 'Email or password doesn\'t match'
				});
			}
		},
		loginModal(){
			this.myModal = new Modal(document.getElementById('myModal'));
    		this.myModal.show();
		},
		removeUser(){
			localStorage.removeItem('user_name');
			localStorage.removeItem('user_id');
			localStorage.removeItem('user_role');
		},
		async checkAuth(){
			this.loading = true;
			try {
				const {data} = await axios.get('/user-status/check');
				this.login_status = true;
			} 
			catch (error) {
				this.login_status = false;
				this.removeUser();
			}
			finally{
				this.loading = false;
			}
		}
	},
	created(){
		this.checkAuth();
	}
}
</script>
<style>
.landing{
	background-image: url('/img/background.jpg');
    background-attachment: fixed;
    background-size: cover ;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
}
.bg-dark {
    opacity: 0.7;
}
.navbar .nav-link {
    color: rgba(255, 255, 255, 1) !important;
}
.navbar .nav-link:hover{
	color: #ffc107 !important;
}
.navbar-brand{
	font-size: 20px;
	z-index: 10;
	position: relative;
	color: #ffc107 !important;
	font-family: "Satisfy" !important;
}
.image-container {
	transition: .5s ease;
	height: 100vh;
	width: 100%;
	position: relative;
}
.shadow::before {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.3);
}
img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
}

.img-caption{
	width: 100%;
    padding: 20px;
	border-radius: 5px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}
.img-caption .title{
	font-family: "Satisfy" !important;
	color: #ffc107;
	font-size: 45px;
}
.img-caption .description{
	color: #fff;
	font-style: italic;
	font-size: 20px;
}
.img-caption .btn-img {
	margin-top: 40px;
}
.contact{
	background-color: #F8F9FA;
	padding:40px 60px;
}
.contact-form{
	padding: 1.25rem;
	background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
	border-top-right-radius: 0.25rem;
	border-bottom-right-radius: 0.25rem;
}
.contact-address{
	padding: 1.25rem;
	color: #ffffff;
	background: #01d28e !important;
	border-top-left-radius: 0.25rem;
	border-bottom-left-radius: 0.25rem;
}
.contact-address .dbox .icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.2);
}
.contact-address .dbox .text {
    width: calc(100% - 50px);
}
.footer{
	background-color: #efefef;
    color: #393939;
	padding:40px 60px;
}
.footer-title{
	padding-bottom: 10px;
	margin-bottom: 20px;
	border-bottom: 1px solid rgba(57, 57, 57, 0.15);
	font-size: 20px;
	font-weight: bold;
}

ul.footer-social {
    display: block;
    width: 100%;
	font-size: 15px;
	list-style: none;
}
ul.footer-social li{
	width: 35px;
    display: inline-block;
    padding: 8px;
}

@media (min-width: 992px){
	.navbar-expand-lg .navbar-nav .nav-link {
		padding-right: 0.5rem;
		padding-left: 1rem;
	}
}
@media (max-width: 576px) {

}
</style>