import * as api from '../api/users.js';

export const REQUEST_USERS = 'REQUEST_USERS';
function requestUsers() {
  return {type: REQUEST_USERS};
}

export const RECIEVE_USERS = 'RECIEVE_USERS';
function recieveUsers(json) {
  return {
    type: RECIEVE_USERS,
    users: json.data
  };
}

export function fetchAll() {
  return dispatch => {
    dispatch(requestUsers());
    return api.fetchAll()
      .then(json => dispatch(recieveUsers(json)));
  };
}
