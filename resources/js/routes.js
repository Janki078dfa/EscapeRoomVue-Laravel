const Home = () => import('./components/Home');
const LogIn = () => import('./components/LogIn');
const SignUp = () => import('./components/SignUp');

const ShowBooking = () => import('./components/booking/Read');
const CreateBooking = () => import('./components/booking/Create');
const UpdateBooking = () => import('./components/booking/Update');

const ShowGame = () => import('./components/game/Read');
const CreateGame = () => import('./components/game/Create');
const UpdateGame = () => import('./components/game/Update');

const ShowReview = () => import('./components/review/Read');
const CreateReview = () => import('./components/review/Create');
const UpdateReview = () => import('./components/review/Update');

const ShowRoom = () => import('./components/room/Read');
const CreateRoom = () => import('./components/room/Create');
const UpdateRoom = () => import('./components/room/Update');

const ShowUser = () => import('./components/user/Read');
const CreateUser = () => import('./components/user/Create');
const UpdateUser = () => import('./components/user/Update');

export const routes = [{
    name: 'home', path: '/', component: Home
}, {
    name: 'showBooking', path: '/bookings', component: ShowBooking
}, {
    name: 'createBooking', path: '/create_booking', component: CreateBooking
}, {
    name: 'updateBooking', path: '/update_booking/:id', component: UpdateBooking
}, {
    name: 'showGame', path: '/games', component: ShowGame
}, {
    name: 'createGame', path: '/create_game', component: CreateGame
}, {
    name: 'updateGame', path: '/update_game/:id', component: UpdateGame
}, {
    name: 'showReview', path: '/reviews', component: ShowReview
}, {
    name: 'createReview', path: '/create_review', component: CreateReview
}, {
    name: 'updateReview', path: '/update_review/:id', component: UpdateReview
}, {
    name: 'showRoom', path: '/rooms', component: ShowRoom
}, {
    name: 'createRoom', path: '/create_room', component: CreateRoom
}, {
    name: 'updateRoom', path: '/update_room/:id', component: UpdateRoom
}, {
    name: 'showUser', path: '/users', component: ShowUser
}, {
    name: 'createUser', path: '/create_user', component: CreateUser
}, {
    name: 'updateUser', path: '/update_user/:id', component: UpdateUser
}, {
    name: 'logIn', path: '/login', component: LogIn
}, {
    name: 'signUp', path: '/signup', component: SignUp
}]
