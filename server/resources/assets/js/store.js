import thunkMiddleware from 'redux-thunk';
import {createStore, applyMiddleware} from 'redux';
import rootReducer from './reducers/user';

export default buildStore;

function buildStore() {
  return createStore(
    rootReducer,
    applyMiddleware(
      thunkMiddleware
    )
  );
}
