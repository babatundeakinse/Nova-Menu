Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-menu',
            path: '/nova-menu',
            component: require('./components/Tool'),
        },
    ])
})
