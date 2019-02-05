Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'nova-echo',
            path: '/nova-echo',
            component: require('./components/Tool'),
        },
    ])
})
