import _ from 'lodash';
import {REQUEST_USERS, RECIEVE_USERS} from '../actions/user.js';

const INITIAL_STATE = {
  fetching: false,
  items: []
};

export default userReducer;

function userReducer(state = INITIAL_STATE, action) {
  switch (action.type) {
    case REQUEST_USERS:
      return _.assign({}, state, {
        fetching: true
      });
    case RECIEVE_USERS:
      return _.assign({}, state, {
        fetching: false,
        items: action.users
      });
    default:
      return state
  }
}
