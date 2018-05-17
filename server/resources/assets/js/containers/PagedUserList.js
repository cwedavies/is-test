
import {connect} from 'react-redux';
import UserList from '../components/UserList';

export default connect(mapStateToProps)(UserList);

function mapStateToProps(state) {
  console.log(state);
  return {
    users: state.items
  };
}
