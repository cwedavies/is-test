import React from 'react';
import ReactDOM from 'react-dom';

import PagedUserList from '../containers/PagedUserList';

export default function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">
                            I'm an example component!
                        </div>

                        <PagedUserList />
                    </div>
                </div>
            </div>
        </div>
    );
}
