var granimInstance = new Granim({
    element: '#canvas-basic',
    name: 'basic-gradient',
    direction: 'top-bottom', // 'diagonal', 'top-bottom', 'radial'
    opacity: [1, 1],
    isPausedWhenNotInView: true,
    states : {
        "default-state": {
            gradients: [
                ['#FF8C00', '#40E0D0'],
                ['#FF0080', '#fc4a1a'],
                ['#FFD200', '#F7971E']
			],
			transitionSpeed:7000
        }
	}
	
  });