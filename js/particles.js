particlesJS(
  'js-particles', {
    'particles': {
      'number': {
        'value': 300
      },
        'color': {
          'value': ['#ffd500', '#00c853', '#b7ff6a']
        },
      'shape': {
        'type':  ["circle","square","polygon"],
      },
      'opacity': {
        'value': 1,
        'random': false,
        'anim': {
          'enable': false
        }
      },
      'size': {
        'value': 2.5,
        'random': true,
        'anim': {
          'enable': false
        }
      },
      'line_linked': {
        'enable': false
      },
      'move': {
        'enable': true,
        'speed': 2,
        'direction': 'none',
        'random': true,
        'straight': false,
        'out_mode': 'out'
      }
    },
    'interactivity': {
      'detect_on': 'canvas',
      'events': {
        'onhover': {
          'enable': false
        },
        'onclick': {
          'enable': false
        },
        'resize': true
      }
    },
    'retina_detect': true
});