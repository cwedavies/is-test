import fetch from 'cross-fetch';

export function fetchAll() {
  return fetch('http://127.0.0.1/api/users')
    .then(response => response.json())
}
