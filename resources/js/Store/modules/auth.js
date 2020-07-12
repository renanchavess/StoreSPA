export default{
    state: {
        user: {},
        token: '',
        authenticated: false,
        loading: false
    },
    mutations: {
        setUser(state, payload){
            state.user = payload;
            //console.log(payload);
            localStorage.setItem('user', JSON.stringify(payload))
        },
        setToken(state, payload){
            
            state.token = payload
            
            if(payload.length == 0 )
                localStorage.removeItem('auth-token')
            else
                localStorage.setItem('auth-token', payload)
        },
        setAuthenticated(state, payload){
            state.authenticated = payload
        },        
    },
    getters: {
        name(state){
            return state.user.name
        },
        authenticated(state){
            //console.log(state.authenticated)
            return state.authenticated
        },
        getToken(state){
            return state.token
        }
        
    },
    actions: {
        setLogin( context, payload){          
            context.commit('setUser', payload.user)
            context.commit('setToken', payload.token)   
            context.commit('setAuthenticated', true)                        
        },
        logout(context)
        {
            context.commit('setUser', {})
            context.commit('setToken', '')
            context.commit('setAuthenticated', false)
        },
        reloadPage(context)
        {
            let userLocal = JSON.parse(localStorage.getItem('user'))
            let authLocal = localStorage.getItem('auth-token');
            
            //console.log(userLocal)
            //console.log(authLocal)
            if(userLocal !== null && authLocal !== null)
            {
                context.commit('setUser', userLocal)
                context.commit('setToken',authLocal)
                context.commit('setAuthenticated', true)         
            }
        }
    }
}