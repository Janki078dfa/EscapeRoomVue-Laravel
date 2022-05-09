const Home = () => import('./components/Home');

const ShowBooking = () => import('./components/booking/Create');
const CreateBooking = () => import('./components/booking/Read');
const UpdateBooking = () => import('./components/booking/Update');

const ShowGame = () => import('./components/game/Create');
const CreateGame = () => import('./components/game/Read');
const UpdateGame = () => import('./components/game/Update');

const ShowReview = () => import('./components/review/Create');
const CreateReview = () => import('./components/review/Read');
const UpdateReview = () => import('./components/review/Update');

const ShowRoom = () => import('./components/room/Create');
const CreateRoom = () => import('./components/room/Read');
const UpdateRoom = () => import('./components/room/Update');

const ShowUser = () => import('./components/user/Create');
const CreateUser = () => import('./components/user/Read');
const UpdateUser = () => import('./components/user/Update');

export const routes = [{
    name: 'home', path: '/', component: Home
}, {
    name: 'show', path: '/bookings', component: ShowBooking
}, {
    name: 'create', path: '/create_booking', component: CreateBooking
}, {
    name: 'update', path: '/update_booking/:id', component: UpdateBooking
}, {
    name: 'show', path: '/games', component: ShowGame
}, {
    name: 'create', path: '/create_game', component: CreateGame
}, {
    name: 'update', path: '/update_game/:id', component: UpdateGame
}, {
    name: 'show', path: '/reviews', component: ShowReview
}, {
    name: 'create', path: '/create_review', component: CreateReview
}, {
    name: 'update', path: '/update_review/:id', component: UpdateReview
}, {
    name: 'show', path: '/rooms', component: ShowRoom
}, {
    name: 'create', path: '/create_room', component: CreateRoom
}, {
    name: 'update', path: '/update_room/:id', component: UpdateRoom
}, {
    name: 'show', path: '/users', component: ShowUser
}, {
    name: 'create', path: '/create_user', component: CreateUser
}, {
    name: 'update', path: '/update_user/:id', component: UpdateUser
}]
