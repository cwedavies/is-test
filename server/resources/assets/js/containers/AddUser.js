import React from 'react';
import {connect} from 'react-redux';

export default connect()(AddUser);

function AddUser({dispatch}) {
  return (
    <form className="card">
      <div className="card-body">
        <div className="form-group">
          <label>Username</label>
          <input className="form-control" />
        </div>
        <div className="form-group">
          <label>Email</label>
          <input className="form-control" />
        </div>
        <div className="form-group">
          <label>User Role</label>
          <select className="form-control">
            <option value="1">Admin</option>
          </select>
        </div>
      </div>
      <div className="card-footer">
        <button className="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  );
}
